<?php namespace Github\Repos;

use Github\Base\Options;
use Github\Base\HttpClient;

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
     * get contents
     *
     * @link https://developer.github.com/v3/repos/#list-your-repositories
     *
     * @param array $params
     * @return array
     */
    public function userRepos(array $params):array
    {
        $page = $params['page'] ?? [];

        $uri = "user/repos";

        $page AND $uri = $uri."?page={$page['now']}&per_page={$page['size']}";

        return $this->httpClient->getResult($this->options, $uri, true);
    }

    // ------------------------------------------------------------------------------
    
}