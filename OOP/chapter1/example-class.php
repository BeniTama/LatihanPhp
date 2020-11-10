<?php

class Student
{
}

$classes = get_declared_classes();

echo "Classes: " . implode(', ', $classes) . "<br/>";

$classNames = ['Product', 'Student', 'student'];

foreach ($classNames as $className) {
    if (class_exists($className)) {
        echo "{$className} class ada. <br/>";
    } else {
        echo "{$className} class tidak ada. <br/>";
    }
}
