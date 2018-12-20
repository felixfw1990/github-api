<?php namespace Github\Assist\Base;

use Github\Assist\Exceptions;

/**
 * ----------------------------------------------------------------------------------
 *  Errors
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class Errors
{

    // ------------------------------------------------------------------------------

    /**
     * everything is ok
     */
    const StatusOK = 200;

    // ------------------------------------------------------------------------------

    /**
     * http status code to exceptions
     */
    const StatusExceptions =
    [
        401 => Exceptions\UnauthorizedException::class,

        'default' => Exceptions\GithubException::class,
    ];

    // ------------------------------------------------------------------------------

}
