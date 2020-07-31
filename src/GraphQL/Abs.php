<?php

namespace Github\GraphQL;

use Github\Assist\Base\Options;

/**
 * ---------------------------------------------------------------------------------
 *  Abs
 * ---------------------------------------------------------------------------------
 *
 * @author felix
 * @change 2020/03/16
 */
abstract class Abs
{
    // ------------------------------------------------------------------------------

    /**
     * @var Options
     */
    protected $options;

    // ------------------------------------------------------------------------------

    /**
     * Project constructor.
     *
     * @param Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    // ------------------------------------------------------------------------------
}
