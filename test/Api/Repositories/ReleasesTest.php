<?php namespace GithubTest\Api\Repositories;

use GithubTest\Abs;
use Github\Api\Repositories\Releases;

/**
 * ----------------------------------------------------------------------------------
 *  ReleasesTest
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/29
 */
class ReleasesTest extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * @var Releases
     */
    private $module;

    // ------------------------------------------------------------------------------

    public function setUp()
    {
       parent::setUp();

        $this->module = $this->client->Api()->Repositories()->Releases();
    }
    
    // ------------------------------------------------------------------------------

    /**
     * test contents
     *
     * @throws \Exception
     */
    public function testOwnerRepoBranches()
    {
        $params =
        [
            'owner'     => $this->params['owner'],
            'repo'      => $this->params['repo'],
            'page'      => 1,
            'per_page'  => 1,
        ];

        $result = $this->module->ownerRepoReleases($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------
    
}