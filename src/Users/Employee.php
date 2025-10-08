<?php

namespace App\CarRental\Users;

use DateTimeImmutable;

class Employee extends User{
    public function __construct(
        string $name,
        string $email,
        string $phone,
        private string $employeeId,
        private string $position,
        private DateTimeImmutable $joiningDate
    ) {
        parent::__construct($name, $email, $phone);
    }

    public function getEmployeeId(): string { return $this->employeeId; }
    public function getPosition(): string { return $this->position; }
    public function getJoiningDate(): DateTimeImmutable { return $this->joiningDate; }
}