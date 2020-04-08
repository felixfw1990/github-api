<?php namespace GithubTest\GraphQL;

/**
 * ---------------------------------------------------------------------------------
 *  Abs
 * ---------------------------------------------------------------------------------
 *
 * @author felix
 * @change 2020/03/16
 */
class GraphQLTest extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * @var \Github\GraphQL\GraphQL
     */
    private $tm;

    // ------------------------------------------------------------------------------

    public function setUp():void
    {
        parent::setUp();

        $this->tm = $this->client->GraphQL();
    }
    
    // ------------------------------------------------------------------------------

    public function testRun()
    {
        $str = '{viewer{login}}';

        $status = true;

        try
        {
            $this->tm->run($str);
        }

        catch (\Exception $e){ $status = false; }

        $this->assertTrue($status);
    }

    // ------------------------------------------------------------------------------
}