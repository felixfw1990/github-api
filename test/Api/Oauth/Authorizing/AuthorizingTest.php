<?php namespace GithubTest\Api\Oauth\Authorizing;

use Github\Assist\Base\Helper;
use GithubTest\Abs;

/**
 * ----------------------------------------------------------------------------------
 *  AuthorizingTest
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/21
 */
class AuthorizingTest extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * @var \Github\Api\Oauth\Authorizing\Authorizing
     */
    private $module;

    // ------------------------------------------------------------------------------
    
    public function setUp():void
    {
        parent::setUp();

        $this->module = $this->client->Api()->Oauth()->Authorizing();
    }

    // ------------------------------------------------------------------------------

    /**
     * get url
     *
     * @throws \Exception
     */
    public function testGetUrl()
    {
        $params =
        [
            'scope'           => 'repo',
            'state'           => Helper::getRandString(30),
            'approval_prompt' => 'yes',
            'redirect_uri'    => $this->params['code_redirect_uri'],
            'client_id'       => $this->params['client_id'],
        ];

        $result = $this->module->getUrl($params);

        echo "\nstate:{$params['state']}\n";

        Helper::p($result);

        $this->assertNotEmpty($result);
    }
    
    // ------------------------------------------------------------------------------

    /**
     * test get token
     *
     * @throws \Exception
     */
    public function testGetToken()
    {
        $params =
        [
            'code'          => '1e937f1bd2e6ea0f9f23',
            'state'         => 'Z93QmWdkK6AQroqaZ9EDQNUW2GhsMn',
            'client_id'     => $this->params['client_id'],
            'client_secret' => $this->params['client_secret'],
            'redirect_uri'  => $this->params['token_redirect_uri'],
        ];

        $result = $this->module->getToken($params);

        Helper::p($result);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------
    
}