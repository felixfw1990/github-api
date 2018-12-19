<?php namespace GithubTest;

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

    /**
     * @var Client
     */
    protected $client;

    // ------------------------------------------------------------------------------

    public function setUp()
    {
        $options = ['token' => \Github\Config\Config::getToken()];

        $this->client = new Client($options);
    }

    // ------------------------------------------------------------------------------
    
}