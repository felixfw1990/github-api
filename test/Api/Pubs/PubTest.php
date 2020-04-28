<?php namespace GithubTest\Api\Pubs;

use Github\Api\Pubs\Pubs;
use Github\Assist\Base\API;

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

    private Pubs $module;

    // ------------------------------------------------------------------------------

    /**
     * setUp
     *
     */
    public function setUp():void
    {
        parent::setUp();

        $this->module = $this->client->Api()->Pubs();
    }

    // ------------------------------------------------------------------------------

    public function testRequest():void
    {
        $params =
        [
            'uri'           => API::REPOSITORIES['BRBranches'],
            'request_type'  => 'get',
            'path'          => ['felixfw1990', 'test'],
            'headers'       => [],
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