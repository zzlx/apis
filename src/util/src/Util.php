<?php
namespace Zzlx\Util;

class Util
{
    public static function dbg($var = null)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        exit();
    }
}
