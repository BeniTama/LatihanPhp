<?php

class User
{
    var $firstName;
    var $lastName;
    var $userName;

    function fullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}

class Customer extends User
{
}

$c = new Customer;
$c->firstName = 'Customer';
$c->lastName = 'Taka';

echo $c->fullName() . "<br/>";

if (is_subclass_of($c, 'User')) {
    echo "Instance Customer merupakan subclass Class User <br/>";
}

$parents = class_parents($c);
echo implode(',', $parents);
