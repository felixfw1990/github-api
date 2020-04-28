<?php namespace Github\Api\Pubs;

/**
 * ----------------------------------------------------------------------------------
 *  Pub
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/24
 */
class Pubs extends Abs
{
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

        return $this->options
        ->getClient()
        ->setPath(...$path)
        ->setHeaderParams($headers)
        ->setQuery($queue)
        ->$requestType($uri, $getHeaders, $getData);
    }

    // ------------------------------------------------------------------------------
}