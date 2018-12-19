<?php namespace GithubTest\Repositories;

use Github\Repos\Contents;
use GithubTest\Abs;

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

        $this->module = $this->client->Repos()->Contents();
    }
    
    // ------------------------------------------------------------------------------

    public function testContents()
    {
        $params =
        [
            'repo'  => 'Testing',
            'owner' => 'Uranuslab',
            'path'  => 'base/demo1',
            'ref'   => 'demo1',
        ];

        $result = $this->module->reposContents($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------
    
}