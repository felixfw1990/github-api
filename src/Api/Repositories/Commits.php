<?php

namespace Github\Api\Repositories;

use Exception;
use Github\Assist\Base\API;
use Github\Assist\Base\Client;
use Github\Assist\Base\Helper;

/**
 * ----------------------------------------------------------------------------------
 *  Commits
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class Commits
{
    // ------------------------------------------------------------------------------

    private Client $clientObj;
    private Helper $helperObj;

    // ------------------------------------------------------------------------------

    public function __construct(array $objects = [])
    {
        $this->clientObj = $objects['clientObj'];
        $this->helperObj = $objects['helperObj'] ?? new Helper();
    }

    // ------------------------------------------------------------------------------

    /**
     * get commits list
     *
     * @param array $params
     *
     * @throws Exception
     *
     * @return array
     */
    public function ownerRepoCommits(array $params): array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? '';

        $keys  = ['sha', 'path', 'author', 'since', 'until', 'page', 'per_page'];
        $queue = $this->helperObj->arrayExistCums($params, $keys);

        return $this->clientObj
            ->get()
            ->setPath($owner, $repo)
            ->setQuery($queue)
            ->get(API::REPOSITORIES['CRCommits']);
    }

    // ------------------------------------------------------------------------------

    /**
     * get commit
     *
     * @param array $params
     *
     * @throws Exception
     *
     * @return array
     */
    public function ownerRepoCommitsSha(array $params): array
    {
        $owner  = $params['owner'] ?? '';
        $repo   = $params['repo']  ?? [];
        $sha    = $params['sha']   ?? '';

        return $this->clientObj
            ->get()
            ->setPath($owner, $repo, $sha)
            ->get(API::REPOSITORIES['CRCommit']);
    }

    // ------------------------------------------------------------------------------
}
