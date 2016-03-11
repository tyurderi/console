<?php

namespace WCKZ\Console;

class Console
{

    public static function stop($reason = '')
    {
        if(!empty($reason))
        {
            echo PHP_EOL, 'EXIT (255): ', $reason, PHP_EOL;
        }
        else
        {
            echo PHP_EOL, 'EXIT (255): reasonless exit, lol', PHP_EOL;
        }

        exit(255);
    }

    public static function writeLine($format, $args = null)
    {
        $line = call_user_func_array(
            'Console::write',
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