<?php

declare(strict_types=1);

namespace App;

class Employee
{
    protected string $id;
    protected string $name;
    protected string $designation;
    protected float $salary;


    public function __construct(string $id, string $name, string $designation, float $salary)
    {
        $this->id = $id;
        $this->name = $name;
        $this->designation = $designation;
        $this->salary = $salary;
    }


    public function getInfo()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'designation' => $this->designation,
            'salary' => $this->salary,
        ];
    }
}
