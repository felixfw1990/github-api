<?php namespace Github\Assist\Base;

/**
 * ----------------------------------------------------------------------------------
 *  API
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class API
{
    const LIST =
    [
        // ------------------------------------------------------------------------------

        'server' => 'https://api.github.com',

        // ------------------------------------------------------------------------------
        # repositories

        // repos root
        'RRUser' => 'user/repos',

        // branches
        'RBBranches' => 'repos/%s/%s/branches',

        // comments

        // commits
        'RCCommits' => 'repos/%s/%s/commits',
        'RCCommit'  => 'repos/%s/%s/commits/%s',

        // content
        'RCContents' => 'repos/%s/%s/contents/%s',
    ];
}