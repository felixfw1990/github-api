<?php namespace Github\Api\Repositories;

use Github\Assist\Base\API;
use Github\Assist\Base\Helper;
use Github\Assist\Base\Options;

/**
 * ----------------------------------------------------------------------------------
 *  Releases
 * ----------------------------------------------------------------------------------
 *
 * @TODO felix
 *
 * @author Felix
 * @change 2018/12/29
 */
class Releases
{
    // ------------------------------------------------------------------------------

    /**
     * @var Options
     */
    private $options;

    // ------------------------------------------------------------------------------

    /**
     * Comments constructor.
     *
     * @param Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    // ------------------------------------------------------------------------------

    /**
     * repos Releases
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function ownerRepoReleases(array $params):array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo'] ?? '';

        $keys  = ['page', 'per_page', 'protected'];
        $queue = Helper::arrayExistCums($params, $keys);

        $result = $this->options
        ->getSync()
        ->setPath($owner, $repo)
        ->setQuery($queue)
        ->get(API::REPOSITORIES['RRRReleases'], true);

        return $result;
    }

    // ------------------------------------------------------------------------------
    
}