<?php
/**
 * Created by PhpStorm.
 * User: smykruslanal
 * Date: 28.04.2017
 * Time: 16:05
 */

namespace Module\ContactForm;

/**
 * Class ContactFormSaveToFile
 * @package Module\ContactForm
 */
class ContactFormSaveToFile implements FormSaveInterface
{
    protected $fileName = null;

    /**
     * ContactFormSaveToFile constructor.
     * @param $fileName
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @param array $params
     * @return bool|int
     */
    public function save(array $params)
    {
        return file_put_contents($this->fileName, serialize($params) . "__END__\r\n", FILE_APPEND | LOCK_EX);
    }
}
