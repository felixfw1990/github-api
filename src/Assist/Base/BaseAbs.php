<?php namespace Github\Assist\Base;

use Github\Assist\Exceptions\GithubException;

/**
 * ----------------------------------------------------------------------------------
 *  BaseAbs
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/28
 */
abstract class BaseAbs
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
    public function __construct(Options $options = NULL)
    {
        $options AND $this->options = $options;
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
        $name      = ucfirst($name);
        $nameSpace = get_class($this);

        $tempArray = explode('\\' , $nameSpace);

        array_pop($tempArray);

        $nameSpace = implode('\\', $tempArray);

        $subClass = "{$nameSpace}\\{$name}\\{$name}";

        // check class exists
        if (!class_exists($subClass))
        {
            throw new GithubException("class {$subClass} not found!");
        }

        return new $subClass($this->options);
    }

    // ------------------------------------------------------------------------------

}
