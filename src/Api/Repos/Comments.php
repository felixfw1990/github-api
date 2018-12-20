<?php namespace Github\Repos;

use Github\Assist\Base\Options;
use Github\Base\HttpClient;

/**
 * ----------------------------------------------------------------------------------
 *  Comments
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class Comments
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
     * Comments constructor.
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
     * get comments
     *
     * @param array $param
     * @return array
     */
    public function reposComments(array $param):array
    {
        //@TODO
    }

    // ------------------------------------------------------------------------------

    /**
     * get a comment
     *
     * @param array $param
     * @return array
     */
    public function reposComment(array $param):array
    {
        //@TODO
    }

    // ------------------------------------------------------------------------------
    
}