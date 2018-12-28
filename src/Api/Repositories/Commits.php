<?php namespace Github\Api\Repos;

use Github\Assist\Base\API;
use Github\Assist\Base\Helper;
use Github\Assist\Base\Options;

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

    /**
     * @var Options
     */
    private $options;

    // ------------------------------------------------------------------------------

    /**
     * Commits constructor.
     *
     * @param Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

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
        ->getSync()
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
        ->getSync()
        ->setPath($owner, $repo, $sha)
        ->get(API::REPOSITORIES['CRCommit']);
    }

    // ------------------------------------------------------------------------------
    
}