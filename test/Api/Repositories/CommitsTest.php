<?php

namespace GithubTest\Api\Repositories;

use Exception;
use Github\Api\Repositories\Commits;

/**
 * ----------------------------------------------------------------------------------
 *  CommitsTest
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 *
 * @internal
 */
class CommitsTest extends Abs
{
    // ------------------------------------------------------------------------------

    private Commits $tm;

    // ------------------------------------------------------------------------------

    /**
     * setUp
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->tm = new Commits(['clientObj' => $this->client]);
    }

    // ------------------------------------------------------------------------------

    /**
     * test owner repo commits
     *
     * @throws Exception
     */
    public function testOwnerRepoCommits(): void
    {
        $params =
        [
            'owner'    => $this->params['owner'],
            'repo'     => $this->params['repo'],
            'path'     => 'base/demo1',
            'page'     => 1,
            'per_page' => 5,
        ];

        $result = $this->tm->ownerRepoCommits($params);

        $data = $result['data'] ?? [];

        $headers     = $result['headers'] ?? [];
        $maxPageSize = $this->getLastPage($headers['Link'][0] ?? '');

        $this->assertTrue(\count($data) >= 1);
        $this->assertNotEmpty($maxPageSize);
    }

    // ------------------------------------------------------------------------------

    /**
     * test owner repo commits sha
     *
     * @throws Exception
     */
    public function testOwnerRepoCommitsSha(): void
    {
        $params =
        [
            'owner' => $this->params['owner'],
            'repo'  => $this->params['repo'],
            'sha'   => 'ba6fd6779a70aae80d8b74be23bb4a81b63ae706',
        ];

        $result = $this->tm->ownerRepoCommitsSha($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------
}
