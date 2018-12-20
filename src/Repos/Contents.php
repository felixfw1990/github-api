<?php namespace Github\Repos;

use Github\Base\Options;
use Github\Base\HttpClient;

/**
 * ----------------------------------------------------------------------------------
 *  Contents
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/19
 */
class Contents
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
     * @link https://developer.github.com/v3/repos/contents/#get-contents
     *
     * @param array $params
     * @return array
     */
    public function reposContents(array $params):array
    {
        $path  = $params['path']  ?? '';
        $repo  = $params['repo']  ?? [];
        $owner = $params['owner'] ?? '';
        $ref   = $params['ref']   ?? 'master';

        $uri = "repos/{$owner}/{$repo}/contents";

        $path AND $uri .= "/{$path}";
        $ref  AND $uri .= "?ref={$ref}";

        return $this->httpClient->getResult($this->options, $uri, false);
    }

    // ------------------------------------------------------------------------------
    
}