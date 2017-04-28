<?php
/**
 * Created by PhpStorm.
 * User: smykruslanal
 */

namespace Module\BuildForm;

use Module\FormBuilder\FormBuilderInterface;

/**
 * Interface BuildFormInterface
 * @package Module\BuildForm
 */
interface BuildFormInterface
{
    /**
     * @return FormBuilderInterface
     */
    public function buildForm();
}