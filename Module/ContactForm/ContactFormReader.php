<?php
/**
 * Created by PhpStorm.
 * User: smykruslanal
 */

namespace Module\ContactForm;

/**
 * Class ContactFormReader
 * @package Module\ContactForm
 */
class ContactFormReader implements ContactFormReaderInterface
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
     * @return array|bool
     */
    public function getItems()
    {
        if (!file_exists($this->fileName)) {
            return false;
        }

        //все сообщения
        $arr = explode("__END__\r\n", trim(file_get_contents(FILE_NAME)));
        $return = [];

        if (!empty($arr)) {
            foreach ($arr as $k => $v) {
                $v = unserialize($v);
                $return[] = $v;
            }
        }

        return $return;
    }
}
