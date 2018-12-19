<?php namespace GithubTest\Repositories;

use Github\Client;
use GithubTest\Abs;
use Github\Repos\Repos;

/**
 * ----------------------------------------------------------------------------------
 *  ReposTest
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/19
 */
class ReposTest extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * @var Repos
     */
    private $module;

    // ------------------------------------------------------------------------------

    public function setUp()
    {
       parent::setUp();

        $options = ['token' => \Github\Config\Config::getToken()];

        $this->module = (new Client($options))->Repos()->repos();
    }
    
    // ------------------------------------------------------------------------------

    public function testContents()
    {
        $params = ['page' => ['size' => 5, 'now' => 1]];

        $result = $this->module->userRepos($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------
    
}