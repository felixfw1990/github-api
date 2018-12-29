<?php namespace Github\Api\Repositories;

use Github\Assist\Base\API;
use Github\Assist\Base\Helper;
use Github\Assist\Base\Options;

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

    /**
     * @var Options
     */
    private $options;

    // ------------------------------------------------------------------------------

    /**
     * Project constructor.
     *
     * @param Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    // ------------------------------------------------------------------------------

    /**
     * get contents
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function userRepos(array $params):array
    {
        $keys =
        [
            'visibility', 'affiliation', 'type',
            'sort', 'direction', 'page', 'per_page'
        ];

        $queue = Helper::arrayExistCums($params, $keys);

        return $this->options
        ->getSync()
        ->setQuery($queue)
        ->get(API::REPOSITORIES['RMRepos'], true);
    }
    
    // ------------------------------------------------------------------------------

    /**
     * repos owner repo tags
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function reposOwnerRepoTags(array $params):array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo'] ?? '';

        return $this->options
        ->getSync()
        ->setPath($owner, $repo)
        ->get(API::REPOSITORIES['RRTags'], true);
    }

    // ------------------------------------------------------------------------------

    /**
     * user user name repos
     *
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function usersUserNameRepos(array $params)
    {
        $userName = $params['username'];

        $keys  = ['page', 'per_page', 'type', 'sort', 'direction'];
        $queue = Helper::arrayExistCums($params, $keys);

        return $this->options
        ->getSync()
        ->setPath($userName)
        ->setQuery($queue)
        ->get(API::REPOSITORIES['RURepos'], true);
    }

    // ------------------------------------------------------------------------------
    
}