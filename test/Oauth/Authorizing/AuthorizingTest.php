<?php namespace GithubTest\Oauth\Authorizing;

use Github\Assist\Base\Helper;
use GithubTest\Abs;
use function GuzzleHttp\Psr7\str;

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
     * @var \Github\Oauth\Authorizing\Authorizing
     */
    private $module;
    // ------------------------------------------------------------------------------
    
    public function setUp()
    {
        parent::setUp();

        $this->module = $this->client->Oauth()->Authorizing()->Authorizing();
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
            'code'          => '7cde46103cc053722d6c',
            'state'         => 'JNnX2TtT4mE0ANih3qe3RJwIyQxKr10',
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