<?php namespace Github\Repos;

use Github\Base\Options;
use Github\Base\HttpClient;

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
     * @var \Github\Base\Options
     */
    private $options;

    // ------------------------------------------------------------------------------

    /**
     * @var \Github\Base\HttpClient
     */
    private $httpClient;

    // ------------------------------------------------------------------------------

    /**
     * Project constructor.
     *
     * @param \Github\Base\Options $options
     */
    public function __construct(Options $options)
    {
        $this->options    = $options;
        $this->httpClient = new HttpClient();
    }

    // ------------------------------------------------------------------------------

    /**
     * get contents folder or file
     *
     * @link https://developer.github.com/v3/repos/branches/#list-branches
     * @param array $params
     * @return array
     */
    public function reposBranches(array $params):array
    {
        $repo      = $params['repo']  ?? [];
        $owner     = $params['owner'] ?? '';
        $page      = $params['page'] ?? [];
        $protected = $params['protected'] ?? false;

        $uri = "repos/{$owner}/{$repo}/branches";

        $uri .= "?protected={$protected}";

        $page AND $uri = $uri."&page={$page['now']}&per_page={$page['size']}";

        return $this->httpClient->getResult($this->options, $uri, true);
    }

    // ------------------------------------------------------------------------------
    
}