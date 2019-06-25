<?php namespace Github\Api\Repositories;

use Github\Assist\Base\API;
use Github\Assist\Base\Helper;
use Github\Assist\Base\Options;

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
     * owner repo contents path put(create or update)
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function merge(array $params):array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? [];

        $keys  = ['base', 'head', 'commit_message'];
        $queue = Helper::arrayExistCums($params, $keys);

        $result = $this->options
        ->getSync()
        ->setPath($owner, $repo)
        ->setFormParams($queue)
        ->post(API::REPOSITORIES['RORMerges']);

        return $result;
    }

    // ------------------------------------------------------------------------------
    
}