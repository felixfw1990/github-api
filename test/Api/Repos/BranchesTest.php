<?php namespace GithubTest\Api\Repositories;

use GithubTest\Abs;
use Github\Api\Repos\Branches;

/**
 * ----------------------------------------------------------------------------------
 *  BranchesTest
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class BranchesTest extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * @var Branches
     */
    private $module;

    // ------------------------------------------------------------------------------

    public function setUp()
    {
       parent::setUp();

        $this->module = $this->client->Api()->Repos()->Branches();
    }
    
    // ------------------------------------------------------------------------------

    public function testContents()
    {
        $params =
        [
            'repo'      => 'Testing',
            'owner'     => 'Uranuslab',
            'page'      => ['size' => 1, 'now' => 1],
            'protected' => false,
        ];

        $result = $this->module->reposBranches($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------
    
}