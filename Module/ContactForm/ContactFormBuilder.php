<?php
/**
 * Created by PhpStorm.
 * User: smykruslanal
 */

namespace Module\ContactForm;

use Module\BuildForm\BuildFormAbstract;
use Module\BuildForm\BuildFormInterface;
use Module\FormBuilder\FormBuilderInterface;
use Module\FormBuilder\FormBuilderItem;

/**
 * Class ContactFormBuilder
 * @package Module\ContactForm
 */
class ContactFormBuilder extends BuildFormAbstract implements BuildFormInterface
{
    /**
     * @return FormBuilderInterface|null
     */
    public function buildForm()
    {
        $this->builder
            ->add(
                (new FormBuilderItem())
                    ->setName('email')
                    ->setRequired(true)
                    ->setValidator(
                        function ($email) {
                            return (
                            false === filter_var($email, FILTER_VALIDATE_EMAIL)
                                ? 'Неправильный формат поля "email".'
                                : true
                            );
                        }
                    )
            )
            ->add(
                (new FormBuilderItem())
                    ->setName('name')
                    ->setRequired(true)
                    ->setValidator(
                        function ($name) {
                            return (
                                strlen($name) < 3
                                    ? 'Поле "name" должно быть >= 3 символов'
                                    : true
                            );
                        }
                    )
            )

        ;

        return $this->builder;
    }
}
