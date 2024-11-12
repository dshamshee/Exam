<?php
class SubjectMIS {
    private $connection;
    
    // Constructor to initialize the database connection
    public function __construct($host, $username, $password, $dbname) {
        $this->connect($host, $username, $password, $dbname);
    }

    // Connect to MySQL Database
    public function connect($host, $username, $password, $dbname) {
        // Create connection
        $this->connection = new mysqli($host, $username, $password, $dbname);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        } else {
            echo "Connected successfully<br>";
        }
    }

    // Disconnect from MySQL Database
    public function disconnect() {
        if ($this->connection) {
            $this->connection->close();
            echo "Disconnected successfully<br>";
        } else {
            echo "No connection to disconnect.<br>";
        }
    }

    // Insert a new record into the database
    public function insert($table, $columns, $values) {
        $columns = implode(", ", $columns);
        $values = "'" . implode("', '", $values) . "'";
        
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        
        if ($this->connection->query($sql) === TRUE) {
            echo "New record created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
        }
    }

    // Update an existing record in the database
    public function update($table, $updateValues, $condition) {
        $setValues = "";
        foreach ($updateValues as $column => $value) {
            $setValues .= "$column = '$value', ";
        }
        $setValues = rtrim($setValues, ", ");

        $sql = "UPDATE $table SET $setValues WHERE $condition";
        
        if ($this->connection->query($sql) === TRUE) {
            echo "Record updated successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
        }
    }

    // Delete a record from the database
    public function delete($table, $condition) {
        $sql = "DELETE FROM $table WHERE $condition";
        
        if ($this->connection->query($sql) === TRUE) {
            echo "Record deleted successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
        }
    }

    // Select data from the database
    public function select($table, $columns = "*", $condition = "") {
        $sql = "SELECT $columns FROM $table";
        
        if ($condition != "") {
            $sql .= " WHERE $condition";
        }
        
        $result = $this->connection->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                print_r($row);
                echo "<br>";
            }
        } else {
            echo "0 results<br>";
        }
    }
}

// Example usage:
$host = "localhost";
$username = "root";
$password = "";
$dbname = "subject_mis"; // Replace with your actual database name

// Create an object of SubjectMIS class
$subjectMIS = new SubjectMIS($host, $username, $password, $dbname);

// Insert data
$subjectMIS->insert("subjects", ["subject_name", "subject_code"], ["Mathematics", "MATH101"]);

// Select data
$subjectMIS->select("subjects");

// Update data
$subjectMIS->update("subjects", ["subject_name" => "Advanced Mathematics"], "subject_code = 'MATH101'");

// Delete data
$subjectMIS->delete("subjects", "subject_code = 'MATH101'");

// Disconnect from the database
$subjectMIS->disconnect();
?>
