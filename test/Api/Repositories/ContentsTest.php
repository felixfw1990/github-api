<?php

namespace GithubTest\Api\Repositories;

use Exception;
use Github\Api\Repositories\Contents;

/**
 * ----------------------------------------------------------------------------------
 *  Contents
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/19
 *
 * @internal
 */
class ContentsTest extends Abs
{
    // ------------------------------------------------------------------------------

    private Contents $module;

    // ------------------------------------------------------------------------------

    /**
     * setUp
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->module = $this->client->Api()->Repositories()->Contents();
    }

    // ------------------------------------------------------------------------------

    /**
     * test owner repo contents path
     *
     * @throws Exception
     */
    public function testOwnerRepoContentsPathGet(): void
    {
        $params =
        [
            'owner' => $this->params['owner'],
            'repo'  => $this->params['repo'],
            'path'  => 'base/demo1',
            'ref'   => 'demo1',
        ];

        $result = $this->module->ownerRepoContentsPath($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------

    /**
     * download
     *
     * @throws Exception
     */
    public function testOwnerRepoContentsPathPut(): void
    {
        $jpgImageUrl = 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1546513898773&di=dc9b490443745d40652cc7be4a788577&imgtype=0&src=http%3A%2F%2Fc.hiphotos.baidu.com%2Fzhidao%2Fwh%253D450%252C600%2Fsign%3D1bbb2c61952bd4074292dbf94eb9b267%2Fe1fe9925bc315c602637d9a68fb1cb13485477dc.jpg';
        $result      = \file_get_contents($jpgImageUrl);

        $content     = \base64_encode($result);
        $number      = \random_int(100000, 10000000000);
        $suffix      = 'jpg';
        $params      =
        [
            'owner'     => $this->params['owner'],
            'repo'      => $this->params['repo'],
            'path'      => "base/demo1/commit{$number}.{$suffix}",
            'message'   => 'test commit create file',
            'content'   => $content,
            'branch'    => 'master',
            'committer' => [
                'name'  => 'felixfw1111',
                'email' => 'felixfw1111@gmail.com',
            ],
            //            'author'    =>
            //            [
            //                'name' => 'felixfw1111',
            //                'email' => 'felixfw1111@gmail.com',
            //            ],
        ];

        $result = $this->module->ownerRepoContentsPathPut($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------

    /**
     * test owner repo contents path delete
     *
     * @throws Exception
     */
    public function testOwnerRepoContentsPathDelete(): void
    {
        $params =
        [
            'owner'     => $this->params['owner'],
            'repo'      => $this->params['repo'],
            'path'      => 'base/demo2/b.txt',
            'sha'       => '0a792b5f95356b6bb82409c7cb7b2168af1652c9',
            'branch'    => 'master',
            'message'   => 'test commit delete file',
            'committer' => [
                'name'  => 'felixfw1111',
                'email' => 'felixfw1111@gmail.com',
            ],
            //            'author'    =>
            //            [
            //                'name' => 'felixfw1111',
            //                'email' => 'felixfw1111@gmail.com',
            //            ],
        ];

        $result = $this->module->ownerRepoContentsPathDelete($params);

        $this->assertNotEmpty($result);
    }

    // ------------------------------------------------------------------------------
}
