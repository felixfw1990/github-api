<?php namespace Github\Api\Data;

use Github\Assist\Base\API;
use Github\Assist\Base\Helper;

/**
 * ---------------------------------------------------------------------------------
 *  Tree
 * ---------------------------------------------------------------------------------
 *
 * @author felix
 * @change 2019/06/25
 */
class Tree extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * create tree
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function create(array $params):array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? [];

        //tree:path,mode,type,sha,content
        $keys  = ['tree', 'base_tree'];
        $queue = Helper::arrayExistCums($params, $keys);

        $result = $this->options
        ->getClient()
        ->setPath($owner, $repo)
        ->setFormParams($queue)
        ->post(API::DATA['RORGTrees']);

        return $result;
    }

    // ------------------------------------------------------------------------------
}