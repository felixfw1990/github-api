<?php namespace GithubTest\Repositories;

use GithubTest\Abs;
use Github\Api\Repositories\Root;
use Github\Assist\Base\Helper;

/**
 * ----------------------------------------------------------------------------------
 *  RootTest
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/28
 */
class RootTest extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * @var Root
     */
    private $module;

    // ------------------------------------------------------------------------------

    public function setUp():void
    {
       parent::setUp();

        $this->module = $this->client->Api()->Repositories()->Root();
    }
    
    // ------------------------------------------------------------------------------

    /**
     * user repos
     *
     * @throws \Exception
     */
    public function testUserRepos()
    {
        $params =
        [
            'page'     => 1,
            'per_page' => 5,
        ];

        $result = $this->module->userRepos($params);

        $data = $result['data'] ?? [];

        $headers     = $result['headers'] ?? [];
        $pageMaxSize = Helper::getLastPage($headers['Link'][0] ?? '');

        $this->assertCount(5, $data);
        $this->assertNotEmpty($pageMaxSize);
    }

    // ------------------------------------------------------------------------------

    /**
     * user repos
     *
     * @throws \Exception
     */
    public function testReposOwnerRepoTags()
    {
        $params =
        [
            'owner'    => $this->params['owner'],
            'repo'     => $this->params['repo'],
            'page'     => 1,
            'per_page' => 1,
        ];

        $result = $this->module->reposOwnerRepoTags($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------

    /**
     * user repos
     *
     * @throws \Exception
     */
    public function testUserUserNameRepos()
    {
        $params =
        [
            'username' => 'felixfw1111',
            'page'     => 1,
            'per_page' => 1,
        ];

        $result = $this->module->usersUserNameRepos($params);

        $data = $result['data'] ?? [];

        $headers     = $result['headers'] ?? [];
        $pageMaxSize = Helper::getLastPage($headers['Link'][0] ?? '');

        $this->assertCount(1, $data);
        $this->assertNotEmpty($pageMaxSize);
    }

    // ------------------------------------------------------------------------------
    
}