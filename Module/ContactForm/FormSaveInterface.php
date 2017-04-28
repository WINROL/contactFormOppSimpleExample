<?php
/**
 * Created by PhpStorm.
 * User: smykruslanal
 * Date: 28.04.2017
 * Time: 15:56
 */

namespace Module\ContactForm;

/**
 * Interface FormSaveInterface
 * @package Module\ContactForm
 */
interface FormSaveInterface
{
    /**
     * @param array $params
     * @return mixed
     */
    public function save(array $params);
}
