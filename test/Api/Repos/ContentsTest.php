<?php namespace GithubTest\Repositories;

use Github\Assist\Base\Helper;
use GithubTest\Abs;
use Github\Api\Repos\Contents;

/**
 * ----------------------------------------------------------------------------------
 *  Contents
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/19
 */
class ContentsTest extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * @var Contents
     */
    private $module;

    // ------------------------------------------------------------------------------

    public function setUp()
    {
       parent::setUp();

        $this->module = $this->client->Api()->Repos()->Contents();
    }
    
    // ------------------------------------------------------------------------------

    /**
     * test owner repo contents path
     *
     * @throws \Exception
     */
    public function testOwnerRepoContentsPath()
    {
        $params =
        [
            'repo'  => 'Testing',
            'owner' => 'Uranuslab',
            'path'  => 'base/demo1',
            'ref'   => 'demo1',
        ];

        $result = $this->module->ownerRepoContentsPath($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------
    
}