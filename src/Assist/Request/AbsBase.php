<?php namespace Github\Assist\Request;

use GuzzleHttp\Client;
use Github\Assist\Base\API;
use Github\Assist\Base\Helper;
use Github\Assist\Exceptions\GithubException;
use Psr\Http\Message\ResponseInterface;

/**
 * ----------------------------------------------------------------------------------
 * Nylas RESTFul Request Base
 * ----------------------------------------------------------------------------------
 *
 * @author lanlin
 * @change 2018/11/30
 */
trait AbsBase
{

    // ------------------------------------------------------------------------------

    /**
     * @var \GuzzleHttp\Client
     */
    private $guzzle;

    // ------------------------------------------------------------------------------

    /**
     * enable or disable debug mode
     *
     * @var bool|resource
     */
    private $debug = false;

    // ------------------------------------------------------------------------------

    private $proxy         = '';
    private $formFiles     = [];
    private $pathParams    = [];
    private $jsonParams    = [];
    private $queryParams   = [];
    private $headerParams  = [];
    private $bodyContents  = [];
    private $onHeadersFunc = [];

    // ------------------------------------------------------------------------------

    /**
     * Request constructor.
     *
     * @param string|NULL $server
     * @param bool|resource $debug
     * @param string $proxy
     */
    public function __construct(string $server = null, $debug = false, string $proxy = '')
    {
        $option = ['base_uri' => trim($server ?? API::SERVER)];

        $proxy && $option['http']['proxy'] = $proxy;

        $this->debug  = $debug;
        $this->guzzle = new Client($option);
    }

    // ------------------------------------------------------------------------------

    /**
     * set path params
     *
     * @param string[] $path
     * @return $this
     */
    public function setPath(string ...$path)
    {
        $this->pathParams = $path;

        return $this;
    }

    // ------------------------------------------------------------------------------

    /**
     * set body value
     *
     * @param string|resource|\Psr\Http\Message\StreamInterface $body
     * @return $this
     */
    public function setBody($body)
    {
        $this->bodyContents = ['body' => $body];

        return $this;
    }

    // ------------------------------------------------------------------------------

    /**
     * set query params
     *
     * @param array $query
     * @return $this
     */
    public function setQuery(array $query)
    {
        $this->queryParams = ['query' => $query];

        return $this;
    }

    // ------------------------------------------------------------------------------

    /**
     * set form params
     *
     * @param array $params
     * @return $this
     */
    public function setFormParams(array $params)
    {
        $this->jsonParams = ['json' => $params];

        return $this;
    }

    // ------------------------------------------------------------------------------

    /**
     * set form files
     *
     * @param array $files
     * @return $this
     */
    public function setFormFiles(array $files)
    {
        $this->formFiles = ['multipart' => Helper::arrayToMulti($files)];

        return $this;
    }

    // ------------------------------------------------------------------------------

    /**
     * set header params
     *
     * @param array $headers
     * @param bool  $cover
     * @return $this
     */
    public function setHeaderParams(array $headers, $cover = false)
    {
        $headers = $cover ? $headers:
        array_merge($this->headerParams['headers'] ?? [], $headers);

        $this->headerParams = ['headers' => $headers];

        return $this;
    }

    // ------------------------------------------------------------------------------

    /**
     * @param callable $func
     */
    public function setHeaderFunctions(callable $func)
    {
        $this->onHeadersFunc[] = $func;
    }

    // ------------------------------------------------------------------------------

    /**
     * concat api path for request
     *
     * @param string $api
     * @return string
     */
    private function concatApiPath(string $api)
    {
        return sprintf($api, ...$this->pathParams);
    }

    // ------------------------------------------------------------------------------

    /**
     * get exception message
     *
     * @param \Exception $e
     * @return string
     */
    private function getExceptionMsg(\Exception $e)
    {
        $preExcep = $e->getPrevious();

        $finalExc = ($preExcep instanceof GithubException) ? $preExcep : $e;

        return $finalExc->getMessage();
    }

    // ------------------------------------------------------------------------------

    /**
     * concat options for request
     *
     * @param bool $httpErrors
     * @return array
     */
    private function concatOptions(bool $httpErrors = false)
    {
        $temp =
        [
            'debug'       => $this->debug,
//            'on_headers'  => $this->onHeadersFuncions(),
            'http_errors' => $httpErrors,
        ];

        return array_merge(
            $temp,
            empty($this->formFiles) ? [] : $this->formFiles,
            empty($this->jsonParams) ? [] : $this->jsonParams,
            empty($this->queryParams) ? [] : $this->queryParams,
            empty($this->headerParams) ? [] : $this->headerParams,
            empty($this->bodyContents) ? [] : $this->bodyContents
        );

    }

    // ------------------------------------------------------------------------------

    /**
     * Parse the JSON response body and return an array
     *
     * @param ResponseInterface $response
     * @param bool $headers true return headers
     * @param bool $data  true return  body
     * @return mixed
     * @throws \Exception if the response body is not in JSON format
     */
    private function parseResponse
    (
        ResponseInterface $response, bool $headers = false, $data = true
    )
    {
        if ($data && !$headers) { return $this->parseResponseData($response); }

        if ($headers && !$data) { return $this->parseResponseHeaders($response); }

        // Are you ok?
        if (!$headers && !$data) { return []; }

        return
        [
            'data'    => $this->parseResponseData($response),
            'headers' => $this->parseResponseHeaders($response),
        ];
    }

    // ------------------------------------------------------------------------------

    /**
     * parse response data
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return array
     */
    private function parseResponseData(ResponseInterface $response)
    {
        $expc = 'application/json';
        $type = $response->getHeader('Content-Type');

        $noJson = strpos(strtolower(current($type)), $expc) === false;

        $data = $noJson ?
        $response->getBody():
        $response->getBody()->getContents();

        $noJson OR $data = json_decode($data, true);

        return $data;
    }

    // ------------------------------------------------------------------------------

    /**
     * parse response headers
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return array
     */
    private function parseResponseHeaders(ResponseInterface $response):array
    {
        //get headers
        return $response->getHeaders();
    }

    // ------------------------------------------------------------------------------

}
