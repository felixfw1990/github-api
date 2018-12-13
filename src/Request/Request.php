<?php namespace Github\Request;

/**
 * ----------------------------------------------------------------------------------
 *  Request
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/13
 */
class Request extends Abs
{
    // ------------------------------------------------------------------------------

    public function get(string $api)
    {
        $apiPath = $this->concatApiPath($api);
        $options = $this->concatOptions();

        try
        {
            $response = $this->guzzle->get($apiPath, $options);
        }
        catch (\Exception $e)
        {
            throw new NylasException($this->getExceptionMsg($e));
        }

        return $this->parseResponse($response, false);
    }
    
    // ------------------------------------------------------------------------------
    
}