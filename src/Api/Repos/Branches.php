<?php namespace Github\Api\Repos;

use Github\Assist\Base\API;
use Github\Assist\Base\Helper;
use Github\Assist\Base\Options;
use Github\Assist\Request\HttpClient;

/**
 * ----------------------------------------------------------------------------------
 *  Branch
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class Branches
{
    // ------------------------------------------------------------------------------

    /**
     * @var Options
     */
    private $options;

    // ------------------------------------------------------------------------------

    /**
     * @var HttpClient
     */
    private $httpClient;

    // ------------------------------------------------------------------------------

    /**
     * Project constructor.
     *
     * @param Options $options
     */
    public function __construct(Options $options)
    {
        $this->options    = $options;
        $this->httpClient = new HttpClient($options);
    }

    // ------------------------------------------------------------------------------

    /**
     * repos branches
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function reposBranches(array $params):array
    {
        $path  = [$params['owner'] ?? '', $params['repo'] ?? ''];
        $queue =
        [
            'page'      => $params['page']['now'] ?? 1,
            'per_page'  => $params['page']['size'] ?? 1,
            'protected' => $params['protected'] ?? false,
        ];

        $result = $this->options
        ->getSync()
        ->setPath(...$path)
        ->setQuery($queue)
        ->get(API::LIST['reposBranches'], true);

        return
        [
            'data'     => $result['data'] ?? [],
            'max_page' => Helper::getMaxPage($result['headers'])
        ];
    }

    // ------------------------------------------------------------------------------
    
}