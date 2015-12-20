<?php
/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:19 AM
 */

namespace Log;

class Log
{
    public static function write($text)
    {
        $text = date('c') . "\t" . $text . PHP_EOL;

        file_put_contents(HIRVI_ROOT . '/logs/log.txt', $text, FILE_APPEND);
    }
}