<?php namespace Github\Assist\Base;

use Github\Assist\Request\Async;
use Github\Assist\Request\Sync;

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

    /**
     * @var bool
     */
    private $debug;

    // ------------------------------------------------------------------------------

    /**
     * @var string
     */
    private $logFile;

    // ------------------------------------------------------------------------------

    /**
     * @var string
     */
    private $token;

    // ------------------------------------------------------------------------------

    /**
     * @var string
     */
    private $proxy;

    // ------------------------------------------------------------------------------

    /**
     * Options constructor.
     *
     * @param array $option
     */
    public function __construct(array $option)
    {
        $this->token   = $option['token'] ?? '';
        $this->debug   = $option['debug'] ?? false;
        $this->proxy   = $option['proxy'] ?? '';
        $this->logFile = $option['log_file'] ?? '';
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
     * get sync request instance
     */
    public function getSync()
    {
        $debug  = $this->debug;
        $server = API::SERVER;

        // when set log file
        if ($this->debug && !empty($this->logFile))
        {
            $debug = fopen($this->logFile, 'a');
        }

        $sync = new Sync($server, $debug, $this->proxy);

        $this->token AND
        $sync->setHeaderParams(['Authorization' => 'token '.$this->token]);

        return $sync;
    }

    // ------------------------------------------------------------------------------

    /**
     * get async request instance
     */
    public function getAsync()
    {
        $debug  = $this->debug;
        $server = API::SERVER;

        // when set log file
        if ($this->debug && !empty($this->logFile))
        {
            $debug = fopen($this->logFile, 'a');
        }

        return new Async($server, $debug, $this->proxy);
    }

    // ------------------------------------------------------------------------------
    
}