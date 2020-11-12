<?php

class Student
{
    public static $instanceCount = 0;

    public $total;
    public $target;

    public function __construct($args = [])
    {
        self::$instanceCount++;
        $this->total = $args['total'] ?? $this->total;
        $this->target = $args['target'] ?? $this->target;
    }
}

class Elementary extends Student
{
    public $total = 3;
    public $target = 2;
}

class Junior extends Student
{
    public $total = 2;
    public $target = 1;
}

class Senior extends Student
{
    public $total = 4;
    public $target = 3;
}

$elementary = new Elementary(['total' => 2, 'target' => 1]);
echo "Elementary: {$elementary->total} <br/>";
echo "Target: {$elementary->target} <br/>";

$junior = new Junior(['total' => 4, 'target' => 2]);
echo "Junior: {$junior->total} <br/>";
echo "Target: {$junior->target} <br/>";


$senior = new Senior();
echo "Senior: {$senior->total} <br/>";
echo "Senior: {$senior->target} <br/>";


echo "Instance Count: " . Student::$instanceCount;
