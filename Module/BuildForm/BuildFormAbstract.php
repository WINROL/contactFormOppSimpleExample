<?php
/**
 * Created by PhpStorm.
 * User: smykruslanal
 */

namespace Module\BuildForm;

use Module\FormBuilder\FormBuilderInterface;

/**
 * Class BuildFormAbstract
 * @package Module\BuildForm
 */
abstract class BuildFormAbstract
{
    protected $builder = null;

    /**
     * ContactFormBuilder constructor.
     * @param FormBuilderInterface $builder
     */
    public function __construct(FormBuilderInterface $builder)
    {
        $this->builder = $builder;
    }
}
