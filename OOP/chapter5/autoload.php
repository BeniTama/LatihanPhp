<?php

function myAutoload($class)
{
    if (preg_match('/\A\w+\Z/', $class)) {
        include 'classes/' . $class . ".php";
    }
}

spl_autoload_register('myAutoload');

$student = new Student();
echo $student->name;
