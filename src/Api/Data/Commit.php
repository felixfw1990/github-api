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
class Commit extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * create commit
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function create(array $params):array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? [];

        //author or committer[name,email,date]
        $keys  = ['message', 'tree', 'parents', 'author', 'committer', 'signature'];
        $queue = Helper::arrayExistCums($params, $keys);

        $result = $this->options
        ->getClient()
        ->setPath($owner, $repo)
        ->setFormParams($queue)
        ->post(API::DATA['RORGCommits']);

        return $result;
    }

    // ------------------------------------------------------------------------------
}