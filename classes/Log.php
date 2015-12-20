<?php
/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:19 AM
 */

class Log
{
    public static function write($text)
    {
        $text = date('c') . "\t" . $text . PHP_EOL;

        if(!file_exists(HIRVI_LOGS)) {
            if(!mkdir(HIRVI_LOGS)){
                die('cant create directory '.HIRVI_LOGS);
            }
        }
        file_put_contents(HIRVI_LOGS . '/log.txt', $text, FILE_APPEND);
    }
}