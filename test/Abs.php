<?php namespace GithubTest;

use Closure;
use Exception;
use \PHPUnit\Framework\TestCase;

use Github\Client;

/**
 * ----------------------------------------------------------------------------------
 *  Abs
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/13
 */
abstract class Abs extends TestCase
{
    // ------------------------------------------------------------------------------

    use TestConfig;

    // ------------------------------------------------------------------------------

    /**
     * @var Client
     */
    protected $client;

    // ------------------------------------------------------------------------------

    public function setUp() : void
    {
        $optionParams =
        [
            'token'    => $this->params['token'],
            'debug'    => false,
            'log_file' => 'Log/log_file.log',
            'proxy'    => $this->params['proxy'],
        ];

        $this->client = new Client($optionParams);
    }

    // ------------------------------------------------------------------------------

    /**
     * assert Logic
     *
     * @param \Closure $fn
     */
    public function assertLogic(Closure $fn):void
    {
        $status = true;

        try
        {
            $fn();
        }

        catch (Exception $e){ $status = false; }

        $this->assertTrue($status);
    }

    // ------------------------------------------------------------------------------
    
}