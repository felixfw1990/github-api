<?php namespace Github\Api\Repositories;

use Github\Assist\Base\API;
use Github\Assist\Base\Helper;

/**
 * ----------------------------------------------------------------------------------
 *  Branch
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class Branches extends Abs
{
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

        return $this->options
        ->getClient()
        ->setPath($owner, $repo)
        ->setQuery($queue)
        ->get(API::REPOSITORIES['BRBranches'], true);
    }

    // ------------------------------------------------------------------------------
    
}