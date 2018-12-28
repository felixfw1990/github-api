<?php namespace Github\Assist\Base;

use Github\Assist\Exceptions\GithubException;

/**
 * Trait Abs
 *
 * @package Github\Base
 */
class BaseAbs
{

    // ------------------------------------------------------------------------------

    /**
     * @var Options
     */
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
     * call
     *
     * @param string $name
     * @param array  $arguments
     * @return mixed
     * @throws \Github\Assist\Exceptions\GithubException
     */
    public function __call(string $name, array $arguments)
    {
        $nmSpace  = trim(get_class($this), 'Abs');
        $nmSpace  = trim($nmSpace, '\\');
        $subClass = $nmSpace .'\\'. ucfirst($name);

        // check class exists
        if (!class_exists($subClass))
        {
            throw new GithubException("class {$subClass} not found!");
        }

        return new $subClass($this->options);
    }

    // ------------------------------------------------------------------------------

}
