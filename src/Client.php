<?php namespace Github;

use Github\Base\Options;
use Github\Exceptions\GithubExceptions;

/**
 * ----------------------------------------------------------------------------------
 *  Client
 * ----------------------------------------------------------------------------------
 *
 * @method Repos\Abs Repos()
 *
 * @author Felix
 * @change 2018/12/13
 */
class Client 
{
    // ------------------------------------------------------------------------------
    
    private $options;

    // ------------------------------------------------------------------------------

    /**
     * Client constructor.
     *
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->options = new Options($options);
    }

    // ------------------------------------------------------------------------------

    /**
     * get options
     *
     * @return \Github\Base\Options
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
     * @throws \Github\Exceptions\GithubExceptions
     */
    public function __call(string $name, array $arguments)
    {
        $apiClass = __NAMESPACE__ .'\\'. ucfirst($name) . '\\Abs';

        // check class exists
        if (!class_exists($apiClass))
        {
            throw new GithubExceptions("class {$apiClass} not found!");
        }

        return new $apiClass($this->options);
    }

    // ------------------------------------------------------------------------------
    
}