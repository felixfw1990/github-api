<?php namespace GithubTest\Api\Data;

use Github\Api\Data\Data;
use Github\Assist\Base\Helper;

/**
 * ---------------------------------------------------------------------------------
 *  BlobTest
 * ---------------------------------------------------------------------------------
 *
 * @author felix
 * @change 2019/06/25
 */
class DataTest extends Abs
{
    // ------------------------------------------------------------------------------

    private Data $module;

    // ------------------------------------------------------------------------------

    /**
     * setUp
     *
     */
    public function setUp():void
    {
       parent::setUp();

        $this->module = $this->client->Api()->Data();
    }
    
    // ------------------------------------------------------------------------------

    /**
     * @throws \Exception
     */
    public function testData():void
    {
        $filePath = 'img.zip';
        $content  = fopen($filePath, 'rb');
        $content  = fread($content, filesize($filePath));
        $content  = base64_encode($content);

        $suffix   = 'zip';
        $hs       = 'g';
        $path     = 'base2/demo2/'.$hs.'.'.$suffix;

        //create blob
        $param =
        [
            'owner'    => $this->params['owner'],
            'repo'     => $this->params['repo'],
            'content'  => $content,
            'encoding' => 'base64',
        ];

        $result = $this->module->Blob()->create($param);

        //create tree
        $param =
        [
            'owner' => $this->params['owner'],
            'repo'  => $this->params['repo'],
            'tree'  =>
            [
                [
                    'path' => $path,
                    'mode' => '100644',
                    'type' => 'blob',
                    'sha'  => $result['sha'],
                ]
            ],
        ];

        $result = $this->module->Tree()->create($param);
        Helper::p($result, 0);

        // create commit
        $param =
        [
            'owner'    => $this->params['owner'],
            'repo'     => $this->params['repo'],
            'message'  => $hs.' commit',
            'parents'  => [],
            'tree'     => $result['sha']
        ];

        $result = $this->module->Commit()->create($param);

        Helper::p($result, 0);

        //create merging
        $mergingModule = $this->client->Api()->Repositories()->Merging();

        $param =
        [
            'owner'           => $this->params['owner'],
            'repo'            => $this->params['repo'],
            'base'            => 'master',
            'head'            => $result['sha'],
            'commit_message'  => $hs.' commit message',
        ];

        $result = $mergingModule->merge($param);

        Helper::p($result);
    }

    // ------------------------------------------------------------------------------
    
}