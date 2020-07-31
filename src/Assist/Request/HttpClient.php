<?php

namespace Github\Assist\Request;

use Exception;
use Github\Assist\Exceptions\GithubException;

/**
 * ----------------------------------------------------------------------------------
 *  Sync
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class HttpClient
{
    // ------------------------------------------------------------------------------

    // base trait
    use AbsBase;

    // ------------------------------------------------------------------------------

    /**
     * get request sync
     *
     * @param string $api
     *
     * @throws Exception
     *
     * @return mixed
     */
    public function get(string $api)
    {
        $apiPath = $this->concatApiPath($api);
        $options = $this->concatOptions();

        try
        {
            $response = $this->guzzle->get($apiPath, $options);
        }
        catch (Exception $e)
        {
            throw new GithubException($this->getExceptionMsg($e));
        }

        return $this->parseResponse($response);
    }

    // ------------------------------------------------------------------------------

    /**
     * put request sync
     *
     * @param string $api
     *
     * @throws Exception
     *
     * @return mixed
     */
    public function put(string $api)
    {
        $apiPath = $this->concatApiPath($api);
        $options = $this->concatOptions();

        try
        {
            $response = $this->guzzle->put($apiPath, $options);
        }
        catch (Exception $e)
        {
            throw new GithubException($this->getExceptionMsg($e));
        }

        return $this->parseResponse($response);
    }

    // ------------------------------------------------------------------------------

    /**
     * post request sync
     *
     * @param string $api
     *
     * @throws Exception
     *
     * @return mixed
     */
    public function post(string $api)
    {
        $apiPath = $this->concatApiPath($api);
        $options = $this->concatOptions();

        try
        {
            $response = $this->guzzle->post($apiPath, $options);
        }
        catch (Exception $e)
        {
            throw new GithubException($this->getExceptionMsg($e));
        }

        return $this->parseResponse($response);
    }

    // ------------------------------------------------------------------------------

    /**
     * delete request sync
     *
     * @param string $api
     *
     * @throws Exception
     *
     * @return mixed
     */
    public function delete(string $api)
    {
        $apiPath = $this->concatApiPath($api);
        $options = $this->concatOptions();

        try
        {
            $response = $this->guzzle->delete($apiPath, $options);
        }
        catch (Exception $e)
        {
            throw new GithubException($this->getExceptionMsg($e));
        }

        return $this->parseResponse($response);
    }

    // ------------------------------------------------------------------------------
}
