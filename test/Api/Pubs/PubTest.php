<?php namespace GithubTest\Api\Pubs;

use Github\Assist\Base\API;
use GithubTest\Abs;

/**
 * ----------------------------------------------------------------------------------
 *  PubTest
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/24
 */
class PubTest extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * @var \Github\Api\Pubs\Pub
     */
    private $module;

    // ------------------------------------------------------------------------------

    public function setUp()
    {
        parent::setUp();

        $this->module = $this->client->Api()->Pubs()->Pub();
    }

    // ------------------------------------------------------------------------------

    public function testRequest()
    {
        $params =
        [
            'uri'           => API::REPOSITORIES['BRBranches'],
            'request_type'  => 'get',
            'path'          => ['felixfw1990', 'test'],
            'queue'         =>
            [

                'page'      => 1,
                'per_page'  => 1,
                'protected' => false,
            ],
            'get_headers'   => true,
            'get_data'      => true,
        ];

        $result = $this->module->request($params);

        $this->assertNotEmpty($result);
    }
    
    // ------------------------------------------------------------------------------
    
}