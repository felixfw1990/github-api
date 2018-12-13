<?php namespace GithubTest\Project;

use Github\Client;
use GithubTest\Abs;

/**
 * ----------------------------------------------------------------------------------
 *  ProjectTest
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/13
 */
class ProjectTest extends Abs
{
    // ------------------------------------------------------------------------------

//    /**
//     * @var Project
//     */
//    private $module;

    // ------------------------------------------------------------------------------

    public function setUp()
    {
       parent::setUp();

//       $this->module = new Project();
    }
    
    // ------------------------------------------------------------------------------

    public function testAll()
    {
        $options =
        [
            'token' => \Github\Config\Config::getToken(),
        ];

        $result = (new Client($options))->Projects()->Project()->getList();

        var_dump($result);
        $this->assertNotEmpty($result);
    }
    
    // ------------------------------------------------------------------------------
    
}