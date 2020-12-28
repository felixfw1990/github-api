<?php

namespace Github\Api\Data;

use Exception;
use Github\Assist\Base\API;
use Github\Assist\Base\Client;
use Github\Assist\Base\Helper;

/**
 * ---------------------------------------------------------------------------------
 *  Blob
 * ---------------------------------------------------------------------------------
 *
 * @author felix
 * @change 2019/06/25
 */
class Blob
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
        $queue = $this->helperObj->arrayExistCums($params, $keys);

        return $this->clientObj
            ->get()
            ->setPath($owner, $repo)
            ->setFormParams($queue)
            ->post(API::DATA['RORGBlobs']);
    }

    // ------------------------------------------------------------------------------
}
