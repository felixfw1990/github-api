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

    /**
     * @var array
     */
    protected $params =
    [
        'proxy'              => '192.168.0.209:1086',
        'client_id'          => '6cd99c3a287a23e3c03d',
        'client_secret'      => '58de0d1674ed580e03ddc949f389da4e8d80ec70',

        'code_redirect_uri'  => 'https://api.stamsel.com/oauth/auth/callback',
        'token_redirect_uri' => 'https://api.stamsel.com/oauth/auth/callback',

        'token'              => 'e890c15f65ff6438fce53f92dab6b77424543a75',

        'owner'              => 'Uranuslab',
        'repo'               => 'Testing',
    ];

    // ------------------------------------------------------------------------------

    public function setUp():void
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
    
}