<?php namespace Github\Base;

/**
 * Trait Abs
 *
 * @package Github\Base
 */
trait Abs
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
     * @param \Github\Base\Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    // ------------------------------------------------------------------------------

    /**
     * call github apis
     *
     * @param string $name
     * @param array  $arguments
     * @return mixed
     * @throws \GithubExceptions
     */
    public function __call(string $name, array $arguments)
    {
        $nmSpace  = trim(get_class($this), 'Abs');
        $nmSpace  = trim($nmSpace, '\\');
        $subClass = $nmSpace .'\\'. ucfirst($name);

        // check class exists
        if (!class_exists($subClass))
        {
            throw new \GithubExceptions("class {$subClass} not found!");
        }

        return new $subClass($this->options);
    }

    // ------------------------------------------------------------------------------

}
