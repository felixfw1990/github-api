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
        'token'              => '',
        'code_redirect_uri'  => '',
        'token_redirect_uri' => '',
        'client_id'          => '',
        'client_secret'      => '',
    ];

    // ------------------------------------------------------------------------------

    public function setUp()
    {
        $options =
        [
            'token'         => $this->params['token'],
            'debug'         => false,
            'log_file'      => 'Log/log_file.log',
        ];

        $this->client = new Client($options);
    }

    // ------------------------------------------------------------------------------
    
}