<?php namespace GithubTest\Repositories;

use GithubTest\Abs;
use Github\Repos\Commits;

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

    public function setUp()
    {
       parent::setUp();

        $this->module = $this->client->Repos()->Commits();
    }
    
    // ------------------------------------------------------------------------------

    public function testReposCommits()
    {
        $params =
        [
            'owner' => 'Uranuslab',
            'repo'  => 'Testing',
            'page'  =>
            [
                'size' => 1,
                'now' => 1,
            ]
        ];

        $result = $this->module->reposCommits($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------

    public function testReposCommitM()
    {
        $params =
        [
            'repo'  => 'Testing',
            'owner' => 'Uranuslab',
            'sha'   => 'ba6fd6779a70aae80d8b74be23bb4a81b63ae706',
        ];

        $result = $this->module->reposCommit($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------
    
}