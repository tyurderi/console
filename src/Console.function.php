<?php

if(function_exists('Console') === false)
{

    function Console()
    {
        return TM\Console\Console::getInstance();
    }

}