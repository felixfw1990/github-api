<?php namespace GithubTest\Repositories;

use Github\Assist\Base\Helper;
use GithubTest\Abs;
use Github\Api\Repositories\Commits;

/**
 * ----------------------------------------------------------------------------------
 *  CommitsTest
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class CommitsTest extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * @var Commits
     */
    private $module;

    // ------------------------------------------------------------------------------

    public function setUp():void
    {
       parent::setUp();

        $this->module = $this->client->Api()->Repositories()->Commits();
    }
    
    // ------------------------------------------------------------------------------

    /**
     * test owner repo commits
     *
     * @throws \Exception
     */
    public function testOwnerRepoCommits()
    {
        $params =
        [
            'owner'    => $this->params['owner'],
            'repo'     => $this->params['repo'],
            'path'     => 'base/demo1',
            'page'     => 1,
            'per_page' => 5,
        ];

        $result = $this->module->ownerRepoCommits($params);

        $data = $result['data'] ?? [];

        $headers = $result['headers'] ?? [];
        $maxPageSize = Helper::getLastPage($headers['Link'][0] ?? '');

        $this->assertCount(1, $data);
        $this->assertNotEmpty($maxPageSize);
    }

    // ------------------------------------------------------------------------------

    /**
     * test owner repo commits sha
     *
     * @throws \Exception
     */
    public function testOwnerRepoCommitsSha()
    {
        $params =
        [
            'owner' => $this->params['owner'],
            'repo'  => $this->params['repo'],
            'sha'   => 'ba6fd6779a70aae80d8b74be23bb4a81b63ae706',
        ];

        $result = $this->module->ownerRepoCommitsSha($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------
    
}