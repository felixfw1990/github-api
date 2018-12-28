<?php namespace GithubTest\Repositories;

use GithubTest\Abs;
use Github\Api\Repositories\Repos;
use Github\Assist\Base\Helper;

/**
 * ----------------------------------------------------------------------------------
 *  ReposTest
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/19
 */
class ReposTest extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * @var Repos
     */
    private $module;

    // ------------------------------------------------------------------------------

    public function setUp()
    {
       parent::setUp();

        $this->module = $this->client->Api()->Repositories()->repos();
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
        $pageMaxSize = Helper::getMaxPage($headers['Link'][0] ?? '');

        $this->assertCount(5, $data);
        $this->assertNotEmpty($pageMaxSize);
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
        $pageMaxSize = Helper::getMaxPage($headers['Link'][0] ?? '');

        $this->assertCount(1, $data);
        $this->assertNotEmpty($pageMaxSize);
    }

    // ------------------------------------------------------------------------------
    
}