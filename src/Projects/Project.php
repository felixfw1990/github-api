<?php namespace Github\Projects;

use Github\Base\Options;

/**
 * ----------------------------------------------------------------------------------
 *  Project
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/13
 */
class Project
{
    // ------------------------------------------------------------------------------

    /**
     * @var \Github\Base\Options
     */
    private $options;

    // ------------------------------------------------------------------------------

    /**
     * Project constructor.
     *
     * @param \Github\Base\Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    // ------------------------------------------------------------------------------

    public function getList()
    {
       return 'xx';
    } 
    
    // ------------------------------------------------------------------------------
    
}