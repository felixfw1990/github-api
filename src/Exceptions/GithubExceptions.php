<?php namespace Github\Exceptions;

/**
 * ----------------------------------------------------------------------------------
 *  GithubExceptions
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/13
 */
class GithubExceptions extends \Exception
{
    // ------------------------------------------------------------------------------

    protected $code = 999;

    protected $message = 'some issue found when calling github.';

    // ------------------------------------------------------------------------------
    
}