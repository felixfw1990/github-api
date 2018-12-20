<?php namespace Github\Repos;

use Github\Base\Options;
use Github\Base\HttpClient;

/**
 * ----------------------------------------------------------------------------------
 *  Commits
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class Commits
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
     * Commits constructor.
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
     * get commits list
     *
     * @link https://developer.github.com/v3/repos/commits/#list-commits-on-a-repository
     * @param array $params
     * @return array
     */
    public function reposCommits(array $params):array
    {
        $owner  = $params['owner'] ?? '';
        $repo   = $params['repo']  ?? '';
        $path   = $params['path']  ?? '';
        $ref    = $params['ref']   ?? 'master'; //sha 开始位置或者分支列出提交
        $page   = $params['page']  ?? [];

        $uri = "repos/{$owner}/{$repo}/commits?";

        $uri .= "sha={$ref}";

        $path AND $uri .= "&path={$path}";
        $page AND $uri .= "&page={$page['now']}&per_page={$page['size']}";

        return $this->httpClient->getResult($this->options, $uri, true);
    }

    // ------------------------------------------------------------------------------

    /**
     * get a commit
     *
     * @link https://developer.github.com/v3/repos/commits/#get-a-single-commit
     * @param array $params
     * @return array
     */
    public function reposCommit(array $params):array
    {
        $owner  = $params['owner'] ?? '';
        $repo   = $params['repo']  ?? [];
        $sha    = $params['sha']   ?? '';

        $uri = "/repos/{$owner}/{$repo}/commits/{$sha}";

        return $this->httpClient->getResult($this->options, $uri, false);
    }

    // ------------------------------------------------------------------------------
    
}