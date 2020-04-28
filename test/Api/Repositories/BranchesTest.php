<?php namespace GithubTest\Api\Repositories;

use Github\Assist\Base\Helper;
use Github\Api\Repositories\Branches;

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

    private Branches $module;

    // ------------------------------------------------------------------------------

    /**
     * setUp
     *
     */
    public function setUp():void
    {
       parent::setUp();

        $this->module = $this->client->Api()->Repositories()->Branches();
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
            'protected' => false,
        ];

        $result = $this->module->ownerRepoBranches($params);

        $resultData = $result['data'] ?? [];

        $resultHeaders = $result['headers'] ?? [];
        $maxPageSize   = Helper::getLastPage($resultHeaders['Link'][0] ?? '');

        $this->assertCount(1, $resultData);
        $this->assertNotEmpty($maxPageSize);
    }

    // ------------------------------------------------------------------------------
    
}