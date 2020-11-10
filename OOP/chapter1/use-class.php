<?php

class Student
{
    var $firstName;
    var $lastName;
    var $country = 'None';

    function sayHello()
    {
        return 'Hello, World!';
    }

    function fullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}

$student1 = new Student;

$student1->firstName = 'Taka';
$student1->lastName = 'Radjiman';

echo $student1->firstName . "<br/>";
echo $student1->lastName . "<br/>";

echo $student1->sayHello() . "<br/>";
echo $student1->fullName() . "<br/>";

$class_methods = get_class_methods('Student');
echo "Method milik student: ";
echo "<pre>";
print_r($class_methods);
echo "</pre>";

if (method_exists('Student', 'sayHello')) {
    echo "Method sayHello tersedia";
} else {
    echo "Method sayHello tidak tersedia";
}
