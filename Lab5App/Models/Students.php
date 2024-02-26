<?php

namespace Lab5App\Models;

require_once(__DIR__ . '/../Services/DBService.php');

use Lab5App\Services\DBService as DBService;

class Students
{
  /*
        Implement the functionality described below for the static all(), create(), update(),
        and delete() functions, then move on to:

        Step 4: update the DBService.php file
    */

  public static function all()
  {
    // Connect to the database
    DBService::connect('localhost', 'comp4515');

    // Fetch all data from the database
    return DBService::all('students');
  }

  public static function create($name, $email)
  {
    // Connect to the database
    DBService::connect('localhost', 'comp4515');

    // Insert data into the database
    DBService::insert('students', ['name', 'email'], [$name, $email]);
  }

  public static function update($name, $email, $id)
  {
    DBService::connect('localhost', 'comp4515');
    DBService::update('students', ['id', 'name', 'email'], [$id, $name, $email]);
  }

  public static function delete($id)
  {
    DBService::connect('localhost', 'comp4515');
    DBService::delete('students', $id);
  }
}
