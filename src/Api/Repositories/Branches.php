<?php namespace Github\Api\Repositories;

use Github\Assist\Base\API;
use Github\Assist\Base\Helper;
use Github\Assist\Base\Options;

/**
 * ----------------------------------------------------------------------------------
 *  Branch
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class Branches
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
     * repos branches
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function ownerRepoBranches(array $params):array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo'] ?? '';

        $keys  = ['page', 'per_page', 'protected'];
        $queue = Helper::arrayExistCums($params, $keys);

        $result = $this->options
        ->getSync()
        ->setPath($owner, $repo)
        ->setQuery($queue)
        ->get(API::REPOSITORIES['BRBranches'], true);

        return $result;
    }

    // ------------------------------------------------------------------------------
    
}