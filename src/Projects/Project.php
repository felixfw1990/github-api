<?php namespace Github\Projects;

use Github\Base\Options;
use GuzzleHttp\Client;
use function PHPSTORM_META\type;

/**
 * ----------------------------------------------------------------------------------
 *  Project
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/13
 */
class Project
{
    // ------------------------------------------------------------------------------

    /**
     * @var \Github\Base\Options
     */
    private $options;

    // ------------------------------------------------------------------------------

    /**
     * Project constructor.
     *
     * @param \Github\Base\Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    // ------------------------------------------------------------------------------

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList()
    {
        $baseUri = 'https://api.github.com';

        $param = [ 'base_uri' => $baseUri ];

        $client = new Client($param);
        $header =
        [
            'Authorization' => 'token dbea112b8d6b9cf9301ee51f7b55cd6fde24e9f8',
//            'application/vnd.github.mercy-preview+json' => 'accept',
//            'application/vnd.github.nightshade-preview+json' => 'accept',
        ];

        $result = $client->get('/user/repos', ['headers' => $header]);

        $result = $result->getBody();
        $result = $result->getContents();
        $result = json_decode($result, TRUE);

        foreach ($result as $v)
        {
            var_dump($v['name']);
        }

        die;
        var_dump($result);die;
        return $result;
    }

    // ------------------------------------------------------------------------------
    
}