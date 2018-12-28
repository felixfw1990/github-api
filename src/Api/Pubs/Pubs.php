<?php namespace Github\Api\Pubs;

use Github\Assist\Base\Options;

/**
 * ----------------------------------------------------------------------------------
 *  Pub
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/24
 */
class Pubs
{
    // ------------------------------------------------------------------------------

    /**
     * @var Options
     */
    private $options;

    // ------------------------------------------------------------------------------

    /**
     * Project constructor.
     *
     * @param Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    // ------------------------------------------------------------------------------

    /**
     * request public function
     *
     * @param array $params
     * @return array
     */
    public function request(array $params):array
    {
        $uri         = $params['uri']           ?? '';
        $requestType = $params['request_type']  ?? 'get';
        $headers     = $params['headers']       ?? [];
        $path        = $params['path']          ?? [];
        $queue       = $params['queue']         ?? [];
        $getHeaders  = $params['get_headers']   ?? false;
        $getData     = $params['get_data']      ?? true;

        $result = $this->options
        ->getSync()
        ->setPath(...$path)
        ->setHeaderParams($headers)
        ->setQuery($queue)
        ->$requestType($uri, $getHeaders, $getData);

        return $result;
    }

    // ------------------------------------------------------------------------------
    
}