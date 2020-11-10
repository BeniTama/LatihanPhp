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
    var $city;
    var $country;

    function location()
    {
        return $this->city . ', ' . $this->country;
    }

    function fullName()
    {
        return $this->firstName . ' ' . $this->lastName . '(customer)';
    }
}

$u = new User;
$u->firstName = 'Taka';
$u->lastName = 'Radjiman';

$c = new Customer;
$c->firstName = 'Customer';
$c->lastName = 'Taka';
$c->city = 'Cirebon';
$c->country = 'Indonesia';

echo $u->fullName() . "<br/>";
echo $c->fullName() . "<br/>";
echo $c->location() . "<br/>";

if (is_subclass_of($c, 'User')) {
    echo "Instance Customer merupakan subclass Class User <br/>";
}

$parents = class_parents($c);
echo implode(',', $parents);
