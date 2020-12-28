<?php

namespace GithubTest\Api\Repositories;

use Exception;
use Github\Api\Repositories\Branches;

/**
 * ----------------------------------------------------------------------------------
 *  BranchesTest
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 *
 * @internal
 */
class BranchesTest extends Abs
{
    // ------------------------------------------------------------------------------

    private Branches $tm;

    // ------------------------------------------------------------------------------

    /**
     * setUp
     *
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->tm = new Branches(['clientObj' => $this->client]);
    }

    // ------------------------------------------------------------------------------

    /**
     * test contents
     *
     * @throws Exception
     */
    public function testOwnerRepoBranches(): void
    {
        $params =
        [
            'owner'     => $this->params['owner'],
            'repo'      => $this->params['repo'],
            'page'      => 1,
            'per_page'  => 1,
            'protected' => false,
        ];

        $result = $this->tm->ownerRepoBranches($params);

        $resultData = $result['data'] ?? [];

        $resultHeaders = $result['headers'] ?? [];
        $maxPageSize   = $this->getLastPage($resultHeaders['Link'][0] ?? '');

        $this->assertCount(1, $resultData);
        $this->assertNotEmpty($maxPageSize);
    }

    // ------------------------------------------------------------------------------
}
