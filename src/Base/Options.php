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

    /**
     * Options constructor.
     *
     * @param array $option
     */
    public function __construct(array $option)
    {
        $this->token = $option['token'] ?? '';
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
    
}