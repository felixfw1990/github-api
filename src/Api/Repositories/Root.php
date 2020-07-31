<?php

namespace Github\Api\Repositories;

use Exception;
use Github\Assist\Base\API;
use Github\Assist\Base\Helper;

/**
 * ----------------------------------------------------------------------------------
 *  Root
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/28
 */
class Root extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * get contents
     *
     * @param array $params
     *
     * @throws Exception
     *
     * @return array
     */
    public function userRepos(array $params): array
    {
        $keys =
        [
            'visibility', 'affiliation', 'type',
            'sort', 'direction', 'page', 'per_page',
        ];

        $queue = Helper::arrayExistCums($params, $keys);

        return $this->options
            ->getClient()
            ->setQuery($queue)
            ->get(API::REPOSITORIES['RMRepos']);
    }

    // ------------------------------------------------------------------------------

    /**
     * repos owner repo tags
     *
     * @param array $params
     *
     * @throws Exception
     *
     * @return array
     */
    public function reposOwnerRepoTags(array $params): array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? '';

        return $this->options
            ->getClient()
            ->setPath($owner, $repo)
            ->get(API::REPOSITORIES['RRTags']);
    }

    // ------------------------------------------------------------------------------

    /**
     * user user name repos
     *
     * @param array $params
     *
     * @throws Exception
     *
     * @return mixed
     */
    public function usersUserNameRepos(array $params)
    {
        $userName = $params['username'];

        $keys  = ['page', 'per_page', 'type', 'sort', 'direction'];
        $queue = Helper::arrayExistCums($params, $keys);

        return $this->options
            ->getClient()
            ->setPath($userName)
            ->setQuery($queue)
            ->get(API::REPOSITORIES['RURepos']);
    }

    // ------------------------------------------------------------------------------
}
