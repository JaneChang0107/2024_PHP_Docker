<?php 

require_once 'models/Employee.php';

class EmployeesController {
    public function index() {
        // Logic to retrieve a list of employees from the database
        // For demonstration, let's create some dummy employees
        $employees = [
            new Employee("John Doe", "john@example.com"),
            new Employee("Jane Smith", "jane@example.com")
        ];

        // Load corresponding view and pass employees data
        include('views/employee_list.php');
    }

    public function show($id) {
        // Logic to retrieve details of a specific employee from the database based on $id
        // For demonstration, let's create a dummy employee
        $employee = new Employee("John Doe", "john@example.com");

        // Load corresponding view and pass employee data
        include('views/employee_detail.php');
    }

    // You can add methods for creating, updating, and deleting employees here
}

?>
