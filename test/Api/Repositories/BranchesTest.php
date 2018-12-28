<?php namespace GithubTest\Api\Repositories;

use GithubTest\Abs;
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

    /**
     * @var Branches
     */
    private $module;

    // ------------------------------------------------------------------------------

    public function setUp()
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
    public function testOwnerRepoBranches()
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
        $maxPageSize   = Helper::getMaxPage($resultHeaders['Link'][0] ?? '');

        $this->assertCount(1, $resultData);
        $this->assertNotEmpty($maxPageSize);
    }

    // ------------------------------------------------------------------------------
    
}