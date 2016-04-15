<?php

namespace TM\Console;

class Console implements StreamInterface
{

    protected static $instance = null;

    public static function getInstance()
    {
        if(self::$instance === null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function read()
    {
        return trim(fgets(STDIN));
    }

    public function prompt($prompt, $accept = array())
    {
        $this->inline($prompt);

        return in_array(
            strtolower(
                $this->read()
            ),
            $accept
        );
    }

    public function out($format, $args = array())
    {
        call_user_func_array(array($this, 'inline'), func_get_args());

        return $this->br();
    }

    public function inline($format, $args = array())
    {
        return $this->__print(
            call_user_func_array(
                'sprintf',
                func_get_args()
            )
        );
    }

    public function indent($count = 4)
    {
        for($i = 0; $i < $count; $i++)
        {
            $this->inline(' ');
        }

        return $this;
    }

    public function br($count = 1)
    {
        for($i = 0; $i < $count; $i++)
        {
            $this->__print(PHP_EOL);
        }

        return $this;
    }

    public function sl()
    {
        return $this->__print("\r");
    }

    public function el()
    {
        return $this->__print("\n");
    }

    protected function __print($text)
    {
        echo $text;

        return $this;
    }

}