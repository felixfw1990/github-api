<?php

namespace Github\Api\Data;

use Exception;
use Github\Assist\Base\API;
use Github\Assist\Base\Client;
use Github\Assist\Base\Helper;

/**
 * ---------------------------------------------------------------------------------
 *  Tree
 * ---------------------------------------------------------------------------------
 *
 * @author felix
 * @change 2019/06/25
 */
class Tree
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
     * create tree
     *
     * @param array $params
     *
     * @throws Exception
     *
     * @return array
     */
    public function create(array $params): array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? [];

        //tree:path,mode,type,sha,content
        $keys  = ['tree', 'base_tree'];
        $queue = $this->helperObj->arrayExistCums($params, $keys);

        return $this->clientObj
            ->get()
            ->setPath($owner, $repo)
            ->setFormParams($queue)
            ->post(API::DATA['RORGTrees']);
    }

    // ------------------------------------------------------------------------------
}
