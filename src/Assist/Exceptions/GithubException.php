<?php

namespace Github\Assist\Exceptions;

use Exception;

/**
 * ----------------------------------------------------------------------------------
 *  GithubException
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/13
 */
class GithubException extends Exception
{
    // ------------------------------------------------------------------------------

    protected $code = 999;

    protected $message = 'some issue found when calling github.';

    // ------------------------------------------------------------------------------
}
