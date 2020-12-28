<?php

namespace Github\Api\Repositories;

use Exception;
use Github\Assist\Base\API;
use Github\Assist\Base\Client;
use Github\Assist\Base\Helper;

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
     * repos branches
     *
     * @param array $params
     *
     * @throws Exception
     *
     * @return array
     */
    public function ownerRepoBranches(array $params): array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? '';

        $keys  = ['page', 'per_page', 'protected'];
        $queue = $this->helperObj->arrayExistCums($params, $keys);

        return $this->clientObj
            ->get()
            ->setPath($owner, $repo)
            ->setQuery($queue)
            ->get(API::REPOSITORIES['BRBranches']);
    }

    // ------------------------------------------------------------------------------
}
