<?php

namespace TM\Console;

class Console
{

    public static function stop($reason = '', $code = 0)
    {
        if(!empty($reason))
        {
            echo PHP_EOL, 'Stopped: ', $reason, PHP_EOL;
        }

        exit($code);
    }

    public static function writeLine($format, $args = null)
    {
        $line = call_user_func_array(
            array(__CLASS__, 'write'),
            func_get_args()
        );

        self::output($line);
        self::newLine();
    }

    public static function write($format, $args = null)
    {
        $format = '';
        $args   = array();

        foreach(func_get_args() as $i => $arg) {
            if($i == 0) {
                $format = $arg;
            }
            else {
                $args[] = $arg;
            }
        }

        $line = call_user_func_array(
            'sprintf',
            array_merge(
                array($format),
                $args
            )
        );

        self::output($line);
    }

    public static function startLine()
    {
        self::output("\r");
    }

    public static function endLine()
    {
        self::output("\n");
    }

    public static function newLine()
    {
        self::output("\r\n");
    }

    public static function readLine()
    {
        return trim(fgets(STDIN));
    }

    public static function output($line)
    {
        echo $line;
    }

}