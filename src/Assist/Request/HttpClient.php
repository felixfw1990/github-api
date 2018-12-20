<?php namespace Github\Assist\Request;

use Github\Assist\Base\Options;
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
    /**
     * @var Options
     */
    private $option;

    // ------------------------------------------------------------------------------

    /**
     * HttpClient constructor.
     *
     * @param \Github\Assist\Base\Options $options
     */
    public function __construct(Options $options)
    {
        $this->option = $options;
    }

    // ------------------------------------------------------------------------------

    /**
     * @var array
     */
    private $headers;

    // ------------------------------------------------------------------------------

    /**
     * set headers
     *
     * @param array $params
     */
    public function setHeaders(array $params):void
    {
        $this->headers = $params;
    }

    // ------------------------------------------------------------------------------

    /**
     * get result
     *
     * @param string  $uri
     * @param bool    $getMaxPage
     * @return array
     */
    public function getResult (string $uri, bool $getMaxPage = false):array
    {
        $baseUri = $this->option->getBaseUri();

        $clientParam = ['base_uri' => $baseUri];

        $client = new Client($clientParam);

        $headers = $this->requestHeaders();

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
     * @return array
     */
    private function requestHeaders()
    {
        $headers = ['Authorization' => 'token '.$this->option->getToken()];

        $headers = array_merge($headers, $this->headers ?? []);

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