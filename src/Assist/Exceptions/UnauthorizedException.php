<?php namespace Github\Assist\Exceptions;

/**
 * ----------------------------------------------------------------------------------
 *  UnauthorizedException
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class UnauthorizedException extends GithubException
{
    protected $code = 401;

    protected $message = 'No valid API key or access_token provided.';
}