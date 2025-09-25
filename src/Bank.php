<?php

declare(strict_types=1);

namespace App;

class Bank
{
    private string $code;
    private string $name;
    private array $customers = [];
    private array $employees = [];
    private array $lockers = [];

    public function __construct(string $code, string $name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    public function addCustomer(Customer $customer)
    {
        $this->customers[] = $customer;
        return "Customer {$customer->getInfo()['name']} added to bank {$this->name}.";
    }

    public function removeCustomer(Customer $customer)
    {
        foreach ($this->customers as $key => $existingCustomer) {
            if ($existingCustomer->getInfo()['id'] === $customer->getInfo()['id']) {
                unset($this->customers[$key]);
                return "Customer {$customer->getInfo()['name']} removed from bank {$this->name}.";
            }
        }
        return "Customer not found.";
    }

    public function getCustomerInfo($customerId)
    {
        foreach ($this->customers as $customer) {
            if ($customer->getInfo()['id'] == $customerId) {
                return $customer->getInfo();
            }
        }
        return "Customer not found.";
    }

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
        return "Employee {$employee->getInfo()['name']} added to bank {$this->name}.";
    }

    public function getEmployees()
    {
        return $this->employees;
    }

    public function addLocker(Locker $locker)
    {
        if (count($this->lockers) < 4) {
            $this->lockers[] = $locker;
            return "Locker added successfully.";
        }
        return "Maximum locker limit (4) reached.";
    }

    public function getLockers()
    {
        return $this->lockers;
    }


    public function getInfo()
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
            'customer_count' => count($this->customers),
            'employee_count' => count($this->employees),
            'locker_count' => count($this->lockers)
        ];
    }
}
