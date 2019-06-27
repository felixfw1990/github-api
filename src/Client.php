<?php namespace Github;

use Github\Assist\Base\Options;
use Github\Assist\Exceptions\GithubException;

/**
 * ----------------------------------------------------------------------------------
 *  Client
 * ----------------------------------------------------------------------------------
 *
 * @method Api\Api Api()
 * @method Oauth\Oauth Oauth()
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
        $name      = ucfirst($name);
        $nameSpace = __NAMESPACE__;

        $apiClass = "{$nameSpace}\\{$name}\\{$name}";

        // check class exists
        if (!class_exists($apiClass))
        {
            throw new GithubException("class {$apiClass} not found!");
        }

        return new $apiClass($this->options);
    }

    // ------------------------------------------------------------------------------
    
}