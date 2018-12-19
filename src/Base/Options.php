<?php namespace Github\Base;

/**
 * ----------------------------------------------------------------------------------
 *  Options
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/13
 */
class Options
{

    // ------------------------------------------------------------------------------

    private $token;

    // ------------------------------------------------------------------------------

    private $baseUri;

    // ------------------------------------------------------------------------------

    /**
     * Options constructor.
     *
     * @param array $option
     */
    public function __construct(array $option)
    {
        $this->baseUri = 'https://api.github.com';
        $this->token   = $option['token'] ?? '';
    }

    // ------------------------------------------------------------------------------

    /**
     * set token
     *
     * @param string $token
     */
    public function setToken(string $token):void
    {
        $this->token = $token;
    }

    // ------------------------------------------------------------------------------

    /**
     * get token
     *
     * @return string
     */
    public function getToken():string
    {
        return $this->token;
    }
    
    // ------------------------------------------------------------------------------

    /**
     * get base uri
     *
     * @return string
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }

    // ------------------------------------------------------------------------------
    
}