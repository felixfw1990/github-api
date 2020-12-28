<?php

namespace Github\Api\Repositories;

use Exception;
use Github\Assist\Base\API;
use Github\Assist\Base\Client;
use Github\Assist\Base\Helper;

/**
 * ----------------------------------------------------------------------------------
 *  Root
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/28
 */
class Root
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

        $queue = $this->helperObj->arrayExistCums($params, $keys);

        return $this->clientObj
            ->get()
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

        return $this->clientObj
            ->get()
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
        $queue = $this->helperObj->arrayExistCums($params, $keys);

        return $this->clientObj
            ->get()
            ->setPath($userName)
            ->setQuery($queue)
            ->get(API::REPOSITORIES['RURepos']);
    }

    // ------------------------------------------------------------------------------
}
