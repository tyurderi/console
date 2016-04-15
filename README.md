# Console Output Helper

Its pretty easy to use.

``` php
$console = TM\Console\Console::getInstance();
// or
$console = Console(); // works only when function not defined already

// echoes "Hello World{PHP_EOL}"
$console->out('Hello World');

// echoes "10 consoles{PHP_EOL}"
$console->out('%d consoles', 10);
 
// echoes "Hello World"
$console->inline('Hello World'); 

// echoes a new line
$console->br(); 

// starts a line
$console->sl();

// ends a line
$console->el();

// reads user input
$console->read(); 

// simple console prompt
$console->prompt('Continue application? [yes]: ', array('', 'yes', 'y'));
```