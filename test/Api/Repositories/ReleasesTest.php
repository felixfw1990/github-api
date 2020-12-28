<?php

namespace GithubTest\Api\Repositories;

use Exception;
use Github\Api\Repositories\Releases;

/**
 * ----------------------------------------------------------------------------------
 *  ReleasesTest
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/29
 *
 * @internal
 */
class ReleasesTest extends Abs
{
    // ------------------------------------------------------------------------------

    private Releases $tm;

    // ------------------------------------------------------------------------------

    /**
     * setUp
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->tm = new Releases(['clientObj' => $this->client]);
    }

    // ------------------------------------------------------------------------------

    /**
     * test contents
     *
     * @throws Exception
     */
    public function testOwnerRepoBranches(): void
    {
        $params = [
            'owner'    => $this->params['owner'],
            'repo'     => $this->params['repo'],
            'page'     => 1,
            'per_page' => 1,
        ];

        $result = $this->tm->ownerRepoReleases($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------
}
