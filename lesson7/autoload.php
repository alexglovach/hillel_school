<?php

spl_autoload_register('Autoload::loadHillelLessons');

class Autoload
{
    public static function loadHillelLessons()
    {
        $lessons = ['lesson5','lesson6'];
        foreach($lessons as $lesson) {
            $fileNamePath = "../{$lesson}/index.php";
            if(file_exists($fileNamePath)) {
                require_once($fileNamePath);
            }
        }
    }
}