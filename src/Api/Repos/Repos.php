<?php namespace Github\Api\Repos;

use Github\Assist\Base\API;
use Github\Assist\Base\Helper;
use Github\Assist\Base\Options;

/**
 * ----------------------------------------------------------------------------------
 *  Repos
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/19
 */
class Repos
{
    // ------------------------------------------------------------------------------

    /**
     * @var Options
     */
    private $options;

    // ------------------------------------------------------------------------------

    /**
     * Project constructor.
     *
     * @param Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    // ------------------------------------------------------------------------------

    /**
     * get contents
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function userRepos(array $params):array
    {
        $keys  = ['page', 'per_page'];
        $queue = Helper::arrayExistCums($params, $keys);

        return $this->options
        ->getSync()
        ->setQuery($queue)
        ->get(API::LIST['RRUser'], true);
    }

    // ------------------------------------------------------------------------------
    
}