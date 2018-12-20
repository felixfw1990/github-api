<?php namespace Github\Assist\Base;

use Respect\Validation\Validator;
use Respect\Validation\Validatable;
use Github\Assist\Exceptions\GithubException;
use Respect\Validation\Exceptions\NestedValidationException;

/**
 * ----------------------------------------------------------------------------------
 *  Validate
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class Validate extends Validator
{

    // ------------------------------------------------------------------------------

    /**
     * timestamp
     *
     * @return \Respect\Validation\Validator
     */
    public static function timestampType()
    {
        return self::intType()->min(strtotime('1971-1-1'));
    }

    // ------------------------------------------------------------------------------

    /**
     * optional key
     *
     * @param string                          $reference
     * @param \Respect\Validation\Validatable $referenceValidator
     * @return \Respect\Validation\Validator
     */
    public static function keyOptional(string $reference, Validatable $referenceValidator)
    {
        $rules = self::oneOf(self::nullType(), $referenceValidator);

        return self::key($reference, $rules, false);
    }

    // ------------------------------------------------------------------------------

    /**
     * github doing validate
     *
     * @param \Respect\Validation\Validatable $validatable
     * @param                                 $input
     * @return mixed
     * @throws \Github\Assist\Exceptions\GithubException
     */
    public static function doValidate(Validatable $validatable, $input)
    {
        try
        {
            return $validatable->assert($input);
        }
        catch (NestedValidationException $e)
        {
            throw new GithubException($e->getFullMessage());
        }
    }

    // ------------------------------------------------------------------------------

}
