<?php

namespace GithubTest\Api\Oauth\Authorizing;

use Exception;
use Github\Api\Oauth\Authorizing\Authorizing;

/**
 * ----------------------------------------------------------------------------------
 *  AuthorizingTest
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/21
 *
 * @internal
 */
class AuthorizingTest extends Abs
{
    // ------------------------------------------------------------------------------

    private Authorizing $tm;

    // ------------------------------------------------------------------------------

    /**
     * setUp
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->tm = new Authorizing(['clientObj' => $this->client]);
    }

    // ------------------------------------------------------------------------------

    /**
     * get url
     *
     * @throws Exception
     */
    public function testGetUrl(): void
    {
        $params = [
            'scope'           => 'repo',
            'state'           => $this->getRandString(30),
            'approval_prompt' => 'yes',
            'redirect_uri'    => $this->params['code_redirect_uri'],
            'client_id'       => $this->params['client_id'],
        ];

        $result = $this->tm->getUrl($params);

        echo "\nstate:{$params['state']}\n";

        $this->p($result);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------

    /**
     * test get token
     *
     * @throws Exception
     */
    public function testGetToken(): void
    {
        $params = [
            'code'          => '1e937f1bd2e6ea0f9f23',
            'state'         => 'Z93QmWdkK6AQroqaZ9EDQNUW2GhsMn',
            'client_id'     => $this->params['client_id'],
            'client_secret' => $this->params['client_secret'],
            'redirect_uri'  => $this->params['token_redirect_uri'],
        ];

        $result = $this->tm->getToken($params);

        $this->p($result);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------
}
