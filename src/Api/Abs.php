<?php namespace Github\Api;

use Github\Api\Repos\Abs as ReposAbs;
use Github\Api\Pubs\Abs as PubsAbs;
use Github\Assist\Base\Options;
use Github\Assist\Exceptions\GithubException;

/**
 * ----------------------------------------------------------------------------------
 *  Abs
 * ----------------------------------------------------------------------------------
 *
 * @method ReposAbs Repos()
 * @method PubsAbs  Pubs()
 *
 * @author Felix
 * @change 2018/12/19
 */
class Abs
{
    // ------------------------------------------------------------------------------

    private $options;

    // ------------------------------------------------------------------------------

    /**
     * Abs constructor.
     *
     * @param \Github\Assist\Base\Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    // ------------------------------------------------------------------------------

    /**
     * get options
     *
     * @return \Github\Assist\Base\Options
     */
    public function Options()
    {
        return $this->options;
    }

    // ------------------------------------------------------------------------------

    /**
     * call github apis
     *
     * @param string $name
     * @param array  $arguments
     * @return mixed
     * @throws \Github\Assist\Exceptions\GithubException
     */
    public function __call(string $name, array $arguments)
    {
        $apiClass = __NAMESPACE__ .'\\'. ucfirst($name) . '\\Abs';

        // check class exists
        if (!class_exists($apiClass))
        {
            throw new GithubException("class {$apiClass} not found!");
        }

        return new $apiClass($this->options);
    }

}