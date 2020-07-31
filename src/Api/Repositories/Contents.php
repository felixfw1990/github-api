<?php

namespace Github\Api\Repositories;

use Exception;
use Github\Assist\Base\API;
use Github\Assist\Base\Helper;

/**
 * ----------------------------------------------------------------------------------
 *  Contents
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/19
 */
class Contents extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * owner repo contents path
     *
     * @param array $params
     *
     * @throws Exception
     *
     * @return array
     */
    public function ownerRepoContentsPath(array $params): array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? [];
        $path  = $params['path']  ?? '';

        $queue = Helper::arrayExistCum($params, 'ref');

        return $this->options
            ->getClient()
            ->setPath($owner, $repo, $path)
            ->setQuery($queue)
            ->get(API::REPOSITORIES['CRContents']);
    }

    // ------------------------------------------------------------------------------

    /**
     * owner repo contents path put(create or update)
     *
     * File size is less than 30m
     *
     * @param array $params
     *
     * @throws Exception
     *
     * @return array
     */
    public function ownerRepoContentsPathPut(array $params): array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? [];
        $path  = $params['path']  ?? '';

        $keys  = ['message', 'content', 'branch', 'committer', 'author', 'sha'];
        $queue = Helper::arrayExistCums($params, $keys);

        return $this->options
            ->getClient()
            ->setPath($owner, $repo, $path)
            ->setFormParams($queue)
            ->put(API::REPOSITORIES['CRContents']);
    }

    // ------------------------------------------------------------------------------

    /**
     * owner repo contents path delete
     *
     * @param array $params
     *
     * @throws Exception
     *
     * @return array
     */
    public function ownerRepoContentsPathDelete(array $params): array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? [];
        $path  = $params['path']  ?? '';

        $keys  = ['message', 'sha', 'branch', 'committer', 'author'];
        $queue = Helper::arrayExistCums($params, $keys);

        return $this->options
            ->getClient()
            ->setPath($owner, $repo, $path)
            ->setFormParams($queue)
            ->delete(API::REPOSITORIES['CRContents']);
    }

    // ------------------------------------------------------------------------------
}
