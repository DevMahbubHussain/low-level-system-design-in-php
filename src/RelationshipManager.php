<?php

declare(strict_types=1);

namespace App;

class RelationshipManager extends Employee
{
    private $clients = [];
    
    public function __construct($id, $name, $salary) {
        parent::__construct($id, $name, 'Relationship Manager', $salary);
    }
    
    public function addClient(Customer $client) {
        $this->clients[] = $client;
    }
    
    public function getClients() {
        return $this->clients;
    }
    
    public function updateCustomerInfo(Customer $customer, $newInfo) {
        return "Customer information updated successfully by Relationship Manager {$this->name}.";
    }
}
