<?php namespace GithubTest\Repositories;

use Github\Assist\Base\Helper;
use GithubTest\Abs;
use Github\Api\Repositories\Contents;

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

        $this->module = $this->client->Api()->Repositories()->Contents();
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
            'owner' => $this->params['owner'],
            'repo'  => $this->params['repo'],
            'path'  => 'base',
            'ref'   => 'demo1',
        ];

        $result = $this->module->ownerRepoContentsPath($params);

        Helper::p($result);
        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------

    /**
     * download
     *
     * @throws \Exception
     */
    public function testDownload()
    {
        $params =
        [
            'owner' => $this->params['owner'],
            'repo'  => $this->params['repo'],
            'ref'   => 'demo1',
//            'path'  => 'base/demo1/x2.gif',
            'path'  => 'base',
//            'path'  => 'base/demo1/index2.txt',
        ];

        $result = $this->module->ownerRepoContentsPath($params);

        Helper::p($result);
        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------
    
}