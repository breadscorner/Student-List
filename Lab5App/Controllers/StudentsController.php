<?php

namespace Lab5App\Controllers;

require_once('Controller.php');
require_once(__DIR__ . '/../Models/Students.php');

use Lab5App\Controllers\Controller as Controller;
use Lab5App\Models\Students as Students;

class StudentsController extends Controller
{
  public function index()
  {
    $this->render('students', ['students' => Students::all()]);
  }

  public function create()
  {
    // pull data out of request /form submission
    if (isset($_POST['name']) && isset($_POST['email'])) {
      // update the database
      Students::create($_POST['name'], $_POST['email']);
    }
    // render the view - fetches all rows and passes to the view
    $this->render('students', ['students' => Students::all()]);
  }

  public function update()
  {
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])) {
      Students::update($_POST['id'], $_POST['name'], $_POST['email']);
    }
    $this->render('students', ['students' => Students::all()]);
  }

  public function delete()
  {
    if (isset($_POST['id'])) {
      Students::delete($_POST['id']);
    }
    $this->render('students', ['students' => Students::all()]);
  }
}
