<?php namespace Github\Base;

use GuzzleHttp\Client;
use Psr\Http\Message\MessageInterface;

/**
 * ----------------------------------------------------------------------------------
 *  HttpClient
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/19
 */
class HttpClient
{
    // ------------------------------------------------------------------------------

    /**
     * get result
     *
     * @param Options $options
     * @param string  $uri
     * @param bool    $getMaxPage
     * @return array
     */
    public function getResult
    (
        Options $options, string $uri, bool $getMaxPage = false
    ):array
    {
        $baseUri = $options->getBaseUri();
        $token   = $options->getToken();

        $clientParam = ['base_uri' => $baseUri];

        $client = new Client($clientParam);

        $headers = $this->requestHeaders($token);

        $result = $client->get($uri, $headers);

        $data = $this->outputData($result);

        if (!$getMaxPage) { return $data; }

        $maxPage = $this->outputMaxPage($result, $uri);

        return
        [
            'data'     => $data,
            'max_page' => $maxPage,
        ];
    }

    // ------------------------------------------------------------------------------

    /**
     * get headers
     *
     * @param string $token
     * @return array
     */
    private function requestHeaders(string $token)
    {
        $headers =
        [
            'Authorization' => 'token '.$token,
        ];

        return ['headers' => $headers];
    }
    
    // ------------------------------------------------------------------------------

    /**
     * output data
     *
     * @param \Psr\Http\Message\MessageInterface $result
     * @return array
     */
    public function outputData(MessageInterface $result):array
    {
        $body    = $result->getBody();
        $content = $body->getContents();

        return json_decode($content, true);
    }

    // ------------------------------------------------------------------------------

    /**
     * output max page
     *
     * @param \Psr\Http\Message\MessageInterface $result
     * @param string                             $uri
     * @return string
     */
    public function outputMaxPage(MessageInterface $result, string $uri):string
    {
        $linkStr = $result->getHeader('Link');
        $linkStr = $linkStr[0] ?? '';

        // Does not support paging or
        // the number of pages exceeds the maximum number
        if (!$linkStr) { return 1 ;}

        // First treatment
        $rule    = "/(next|first|prev).*page=(\d).*rel=\"last\"/";
        $matches = [];

        preg_match($rule, $linkStr, $matches);

        $linkStr = $matches[0] ?? '';

        // Second treatment
        $rule = '/page=([1-9]\d*)/';
        preg_match($rule, $linkStr, $matches);

        $max = $matches[1] ?? 0;

        if ($max) { return $max; };

        //There is a paging parameter in the uri, but there is no last tag
        preg_match($rule, $uri, $matches);

        return $matches[1] ?? 1;
    }

    // ------------------------------------------------------------------------------
    
}