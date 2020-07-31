<?php

namespace GithubTest\GraphQL;

use Github\GraphQL\GraphQL;

/**
 * ---------------------------------------------------------------------------------
 *  Abs
 * ---------------------------------------------------------------------------------
 *
 * @author felix
 * @change 2020/03/16
 *
 * @internal
 */
class GraphQLTest extends Abs
{
    // ------------------------------------------------------------------------------

    protected GraphQL $tm;

    // ------------------------------------------------------------------------------

    public function setUp(): void
    {
        parent::setUp();

        $this->tm = $this->client->GraphQL();
    }

    // ------------------------------------------------------------------------------

    public function testRun(): void
    {
        $str = '{viewer{login}}';

        $this->assertLogic(fn () => $this->tm->run($str));
    }

    // ------------------------------------------------------------------------------
}
