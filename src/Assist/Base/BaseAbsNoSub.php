<?php

namespace Github\Assist\Base;

use Github\Assist\Exceptions\GithubException;

/**
 * ----------------------------------------------------------------------------------
 *  BaseAbsNoSub
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/28
 */
abstract class BaseAbsNoSub
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
    public function __construct(?Options $options = null)
    {
        $options and $this->options = $options;
    }

    // ------------------------------------------------------------------------------

    /**
     * call
     *
     * @param string $name
     * @param array  $arguments
     *
     * @throws \Github\Assist\Exceptions\GithubException
     *
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        $name      = \ucfirst($name);
        $nameSpace = \get_class($this);

        $tempArray = \explode('\\', $nameSpace);
        \array_pop($tempArray);
        $nameSpace = \implode('\\', $tempArray);

        $subClass = "{$nameSpace}\\{$name}";

        // check class exists
        if (!\class_exists($subClass))
        {
            throw new GithubException("class {$subClass} not found!");
        }

        return new $subClass($this->options);
    }

    // ------------------------------------------------------------------------------
}
