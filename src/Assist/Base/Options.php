<?php

namespace Github\Assist\Base;

use Github\Assist\Request\HttpClient;

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
        $this->token   = $option['token']    ?? '';
        $this->debug   = $option['debug']    ?? false;
        $this->proxy   = $option['proxy']    ?? '';
        $this->logFile = $option['log_file'] ?? '';
    }

    // ------------------------------------------------------------------------------

    /**
     * get sync request instance
     */
    public function getClient(): HttpClient
    {
        $debug  = $this->debug;
        $server = API::SERVER;

        // when set log file
        if ($this->debug && !empty($this->logFile))
        {
            $debug = \fopen($this->logFile, 'ab');
        }

        $sync = new HttpClient($server, $debug, $this->proxy);

        $this->token and
        $sync->setHeaderParams(['Authorization' => 'token '.$this->token]);

        return $sync;
    }

    // ------------------------------------------------------------------------------
}
