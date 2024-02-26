<?php

namespace Lab5App\Services;

class DBService
{
  public static $connection;
  /*
        Ensure before proceeding that you have a 'students' table in a local mysql database.

        If not, issue the following command (either in the MySQL REPL, or your app of choice):
        create table students (id int not null primary key auto_increment, name varchar(255), email varchar(255));

        Once you have implemented the functionality described below, test your
        application using an HTML page or a RESTful API client (Postman is recommended)
        and send the following requests (with any necessary form data):

            GET students/all 
            POST students/create
            POST students/update
            POST students/delete
    */

  public static function connect($host, $database)
  {
    $host = 'localhost';
    $dbname = 'comp4515';

    try {
      self::$connection = new \PDO("mysql:host=$host;dbname=comp4515", 'root', 'Safety.11');

    } catch (\PDOException $e) {
      echo $e->getMessage(); 
  }
}

  public static function insert($table, $cols, $vals)
  {
    // Turn the $cols array into a comma-separated string
    $columns = implode(',', $cols);

    // Create a parameterized SQL statement
    $placeholders = implode(',', array_fill(0, count($vals), '?'));

    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

    try {
      // Prepare the SQL statement
      $stmt = self::$connection->prepare($sql);

      // Execute the statement with values
      $stmt->execute($vals);

      // Return true on success
      return true;
    } catch (\PDOException $e) {
      // Handle any exceptions or errors (e.g., log, return false)
      // For simplicity, this example just echoes the error message
      echo "Error: " . $e->getMessage();

      // Return false to indicate failure
      return false;
    }
  }



  public static function update($table, $cols, $vals)
  {
    $columns = implode(',', $cols);

    $sql = "UPDATE $table SET $columns WHERE id = ?";

    try {
      $stmt = self::$connection->prepare($sql);
      $stmt->execute($vals);
      return true;
    } catch (\PDOException $e) {
      echo "Error: " . $e->getMessage();
      return false;
    }

    
    /*
            Create a parameterized UPDATE table statement using the $table, and column names in $cols,
            then call prepare() and execute() on the $connection property as above
        */
  }

  public static function delete($table, $val)
  {
    $sql = "DELETE FROM $table WHERE id = ?";
    $stmt = self::$connection->prepare($sql);
    $stmt->execute([$val]);
    return true;

    /*
            Create a parameterized DELETE FROM table statement using $table, and the column names in $cols,
            then call prepare() and execute() on the $connection property as above
        */
  }

  public static function all($table)

  {
    $sql = "SELECT * FROM $table";
    $statement = self::$connection->query($sql, \PDO::FETCH_ASSOC);
    $data = $statement->fetchAll();
    return $data;
    /*
            Create a SELECT * FROM $table statement,
            then call the query() method on the $connection property, passing in:
                the sql string
                the \PDO:FETCH_ASSOC constant, which ensures the results are returned as an associative array
            
            The query() method returns a PDO statement object - store that object in a variable, then
            call its fetchAll() method to get the actual array of rows

            Finally, return the array of rows
        */
  }
};
