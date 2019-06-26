<?php namespace Github\Api\Data;

use Github\Assist\Base\API;
use Github\Assist\Base\Helper;
use Github\Assist\Base\Options;

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
     * File size is less than 100m
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function create(array $params):array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? [];

        $keys  = ['content', 'encoding'];
        $queue = Helper::arrayExistCums($params, $keys);

        $result = $this->options
        ->getSync()
        ->setPath($owner, $repo)
        ->setFormParams($queue)
        ->post(API::DATA['RORGBlobs']);

        return $result;
    }

    // ------------------------------------------------------------------------------
}