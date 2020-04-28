<?php namespace GithubTest\Api\Repositories;

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

    private Releases $module;

    // ------------------------------------------------------------------------------

    /**
     * setUp
     *
     */
    public function setUp():void
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
    public function testOwnerRepoBranches():void
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