<?php namespace GithubTest\Repositories;

use GithubTest\Abs;
use Github\Api\Repos\Repos;
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

        $this->module = $this->client->Api()->Repos()->repos();
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
    
}