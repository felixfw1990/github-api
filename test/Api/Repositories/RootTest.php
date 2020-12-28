<?php

namespace GithubTest\Api\Repositories;

use Exception;
use Github\Api\Repositories\Root;

/**
 * ----------------------------------------------------------------------------------
 *  RootTest
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/28
 *
 * @internal
 */
class RootTest extends Abs
{
    // ------------------------------------------------------------------------------

    private Root $tm;

    // ------------------------------------------------------------------------------

    /**
     * setUp
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->tm = new Root(['clientObj' => $this->client]);
    }

    // ------------------------------------------------------------------------------

    /**
     * user repos
     *
     * @throws Exception
     */
    public function testUserRepos(): void
    {
        $params = [
            'page'     => 1,
            'per_page' => 5,
        ];

        $result = $this->tm->userRepos($params);

        $data = $result['data'] ?? [];

        $headers     = $result['headers'] ?? [];
        $pageMaxSize = $this->getLastPage($headers['Link'][0] ?? '');

        $this->assertCount(5, $data);
        $this->assertNotEmpty($pageMaxSize);
    }

    // ------------------------------------------------------------------------------

    /**
     * user repos
     *
     * @throws Exception
     */
    public function testReposOwnerRepoTags(): void
    {
        $params = [
            'owner'    => $this->params['owner'],
            'repo'     => $this->params['repo'],
            'page'     => 1,
            'per_page' => 1,
        ];

        $result = $this->tm->reposOwnerRepoTags($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------

    /**
     * user repos
     *
     * @throws Exception
     */
    public function testUserUserNameRepos(): void
    {
        $params = [
            'username' => 'felixfw1111',
            'page'     => 1,
            'per_page' => 1,
        ];

        $result = $this->tm->usersUserNameRepos($params);

        $data = $result['data'] ?? [];

        $this->assertCount(1, $data);
    }

    // ------------------------------------------------------------------------------
}
