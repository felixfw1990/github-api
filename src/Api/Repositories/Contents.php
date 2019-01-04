<?php namespace Github\Api\Repositories;

use Github\Assist\Base\API;
use Github\Assist\Base\Helper;
use Github\Assist\Base\Options;

/**
 * ----------------------------------------------------------------------------------
 *  Contents
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/19
 */
class Contents
{
    // ------------------------------------------------------------------------------

    /**
     * @var Options
     */
    private $options;

    // ------------------------------------------------------------------------------

    /**
     * Contents constructor.
     *
     * @param \Github\Assist\Base\Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    // ------------------------------------------------------------------------------

    /**
     * owner repo contents path
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function ownerRepoContentsPath(array $params):array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? [];
        $path  = $params['path']  ?? '';

        $queue = Helper::arrayExistCum($params, 'ref');

        $result = $this->options
        ->getSync()
        ->setPath($owner, $repo, $path)
        ->setQuery($queue)
        ->get(API::REPOSITORIES['CRContents']);

        return $result;
    }
    
    // ------------------------------------------------------------------------------

    /**
     * owner repo contents path put
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function ownerRepoContentsPathPut(array $params):array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? [];
        $path  = $params['path']  ?? '';

        $keys  = ['message', 'content', 'branch', 'committer', 'author'];
        $queue = Helper::arrayExistCums($params, $keys);

        $result = $this->options
        ->getSync()
        ->setPath($owner, $repo, $path)
        ->setFormParams($queue)
        ->put(API::REPOSITORIES['CRContents']);

        return $result;
    }

    // ------------------------------------------------------------------------------
    
}