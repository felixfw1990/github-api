<?php

namespace Github\Api\Repositories;

use Exception;
use Github\Assist\Base\API;
use Github\Assist\Base\Client;
use Github\Assist\Base\Helper;

/**
 * ---------------------------------------------------------------------------------
 *  Merging
 * ---------------------------------------------------------------------------------
 *
 * @author felix
 * @change 2019/06/25
 */
class Merging
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
     * owner repo contents path put(create or update)
     *
     * @param array $params
     *
     * @throws Exception
     *
     * @return array
     */
    public function merge(array $params): array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? [];

        $keys  = ['base', 'head', 'commit_message'];
        $queue = $this->helperObj->arrayExistCums($params, $keys);

        return $this->clientObj
            ->get()
            ->setPath($owner, $repo)
            ->setFormParams($queue)
            ->post(API::REPOSITORIES['RORMerges']);
    }

    // ------------------------------------------------------------------------------
}
