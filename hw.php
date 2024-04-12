<?php

class Employee {
    public $esalary;
    public $eabsent;
    public $ebonus;
    public $eet;

    public function __construct($salary, $absent, $bonus, $overtime) {
        $this->esalary = $salary;
        $this->eabsent = $absent;
        $this->ebonus = $bonus;
        $this->eet = $overtime;
    }

    public function calc_pd() {
        return $this->esalary / 30;
    }

    public function calc_ph() {
        return $this->calc_pd() / 8;
    }

    public function calc_absent_deduct() {
        return $this->calc_pd() * $this->eabsent;
    }

    public function calc_ot() {
        return $this->calc_ph() * $this->eet;
    }

    public function calc_netsal() {
        return $this->esalary - $this->ebonus - $this->calc_ot() - $this->calc_absent_deduct();
    }
}

// Initialize the input values
$salary = 4000;
$absent = 10;
$bonus = 500;
$overtime = 40;

// Create Employee object with input values
$employee = new Employee($salary, $absent, $bonus, $overtime);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Details Form</title>
    <style>
        input::placeholder {
            color: rgba(0, 0, 0, 0.4); /* Set the placeholder text color with low opacity */
        }
    </style>
</head>
<body>
    <h2>Employee Details Form</h2>
    <form action="process.php" method="post">
        Employee ID: <input type="text" name="employee_id" placeholder="Employee ID"><br><br>
        Employee Name: <input type="text" name="employee_name" placeholder="Employee Name"><br><br>
        Employee Job: <input type="text" name="employee_job" placeholder="Employee Job"><br><br>
        Employee Salary: <input type="text" name="employee_salary" placeholder="Employee Salary"><br><br>
        Employee Phone: <input type="text" name="employee_phone" placeholder="Employee Phone"><br><br>
        Employee Absent: <input type="text" name="employee_absent" placeholder="Employee Absent"><br><br>
        Employee Bonus: <input type="text" name="employee_bonus" placeholder="Employee Bonus"><br><br>
        Employee Over Time: <input type="text" name="employee_overtime" placeholder="Employee Overtime"><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Output the results
    echo "<br><h3>Calculation Results:</h3>";
    echo "Per Day Salary: $" . $employee->calc_pd() . "<br>";
    echo "Per Hour Salary: $" . $employee->calc_ph() . "<br>";
    echo "Absent Deduction: $" . $employee->calc_absent_deduct() . "<br>";
    echo "Over Time Salary: $" . $employee->calc_ot() . "<br>";
    echo "Net Salary: $" . $employee->calc_netsal() . "<br>";
    ?>

</body>
</html>