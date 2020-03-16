<?php namespace Github\Api\Repositories;

use Github\Assist\Base\API;
use Github\Assist\Base\Helper;

/**
 * ----------------------------------------------------------------------------------
 *  Commits
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class Commits extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * get commits list
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function ownerRepoCommits(array $params):array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? '';

        $keys  = ['sha', 'path', 'author', 'since', 'until', 'page', 'per_page'];
        $queue = Helper::arrayExistCums($params, $keys);

        return $this->options
        ->getClient()
        ->setPath($owner, $repo)
        ->setQuery($queue)
        ->get(API::REPOSITORIES['CRCommits'], true);
    }

    // ------------------------------------------------------------------------------

    /**
     * get commit
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function ownerRepoCommitsSha(array $params):array
    {
        $owner  = $params['owner'] ?? '';
        $repo   = $params['repo']  ?? [];
        $sha    = $params['sha']   ?? '';

        return $this->options
        ->getClient()
        ->setPath($owner, $repo, $sha)
        ->get(API::REPOSITORIES['CRCommit']);
    }

    // ------------------------------------------------------------------------------
    
}