<?php

namespace GithubTest\Api\Data;

use Exception;
use Github\Api\Data\Blob;
use Github\Api\Data\Commit;

use Github\Api\Data\Tree;
use Github\Api\Repositories\Merging;

/**
 * ---------------------------------------------------------------------------------
 *  BlobTest
 * ---------------------------------------------------------------------------------
 *
 * @author felix
 * @change 2019/06/25
 *
 * @internal
 */
class DataTest extends Abs
{
    // ------------------------------------------------------------------------------

    private Blob $tmBlob;
    private Commit $tmCommit;
    private Tree $tmTree;

    // ------------------------------------------------------------------------------

    /**
     * setUp
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->tmBlob = new Blob(['clientObj' => $this->client]);
        $this->tmCommit = new Commit(['clientObj' => $this->client]);
        $this->tmTree = new Tree(['clientObj' => $this->client]);
    }

    // ------------------------------------------------------------------------------

    /**
     * @throws Exception
     */
    public function testData(): void
    {
        $filePath = 'img.zip';
        $content  = \fopen($filePath, 'rb');
        $content  = \fread($content, \filesize($filePath));
        $content  = \base64_encode($content);

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

        $result = $this->tmBlob->create($param);

        //create tree
        $param =
        [
            'owner' => $this->params['owner'],
            'repo'  => $this->params['repo'],
            'tree'  => [
                [
                    'path' => $path,
                    'mode' => '100644',
                    'type' => 'blob',
                    'sha'  => $result['sha'],
                ],
            ],
        ];

        $result = $this->tmTree->create($param);
        $this->p($result, 0);

        // create commit
        $param =
        [
            'owner'    => $this->params['owner'],
            'repo'     => $this->params['repo'],
            'message'  => $hs.' commit',
            'parents'  => [],
            'tree'     => $result['sha'],
        ];

        $result = $this->tmCommit->create($param);

        $this->p($result, 0);

        //create merging
        $param =
        [
            'owner'           => $this->params['owner'],
            'repo'            => $this->params['repo'],
            'base'            => 'master',
            'head'            => $result['sha'],
            'commit_message'  => $hs.' commit message',
        ];

        $result = (new Merging())->merge($param);

        $this->p($result);
    }

    // ------------------------------------------------------------------------------
}
