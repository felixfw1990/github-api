<?php

namespace GithubTest\Api\Pubs;

use Github\Api\Pubs\Pubs;
use Github\Assist\Base\API;

/**
 * ----------------------------------------------------------------------------------
 *  PubsTest
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/24
 *
 * @internal
 */
class PubsTest extends Abs
{
    // ------------------------------------------------------------------------------

    private Pubs $tm;

    // ------------------------------------------------------------------------------

    /**
     * setUp
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->tm = new Pubs(['clientObj' => $this->client]);
    }

    // ------------------------------------------------------------------------------

    public function testRequest(): void
    {
        $params = [
            'uri'          => API::REPOSITORIES['BRBranches'],
            'request_type' => 'get',
            'path'         => ['felixfw1990', 'test'],
            'headers'      => [],
            'queue'        => [

                'page'      => 1,
                'per_page'  => 1,
                'protected' => false,
            ],
            'get_headers' => true,
            'get_data'    => true,
        ];

        $result = $this->tm->request($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------
}
