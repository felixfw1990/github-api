<?php

namespace Github\Api\Data;

use Exception;
use Github\Assist\Base\API;
use Github\Assist\Base\Helper;

/**
 * ---------------------------------------------------------------------------------
 *  Blob
 * ---------------------------------------------------------------------------------
 *
 * @author felix
 * @change 2019/06/25
 */
class Blob extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * File size is less than 100m
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

        $keys  = ['content', 'encoding'];
        $queue = Helper::arrayExistCums($params, $keys);

        return $this->options
            ->getClient()
            ->setPath($owner, $repo)
            ->setFormParams($queue)
            ->post(API::DATA['RORGBlobs']);
    }

    // ------------------------------------------------------------------------------
}
