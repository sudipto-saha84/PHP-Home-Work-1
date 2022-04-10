<?php
require_once '../vendor/autoload.php';

use App\classes\Student;
use App\classes\Auth;

if (isset($_POST['btn']))
{
    $student = new Student($_POST, $_FILES);
    $message = $student->save();
    include 'home.php';
}
elseif (isset($_GET['status']))
{
    if ($_GET['status'] == 'manage')
    {
        $student = new Student();
        $students = $student->getAllstudentInfo();
        include 'manage.php';
    }
    elseif ($_GET['status'] == 'edit')
    {
        $id = $_GET['id'];
        $student = new Student();
        $studentInfo = $student->getstudentInfoById($id);
        extract($studentInfo);
        include 'edit.php';
    }
    elseif ($_GET['status'] == 'delete')
    {
        $id = $_GET['id'];
        $student = new Student();
        $student->deleteStudentInfo($id);
    }
    elseif ($_GET['status'] == 'index')
    {
       $student = new Student();
       $students = $student->getAllStudentInfo();
       include 'index.php';
    }
    elseif ($_GET['status'] == 'detail')
    {
        $id = $_GET['id'];
        $student = new Student();
        $studentInfo = $student->getstudentInfoById($id);
        include 'detail.php';
    }
    elseif ($_GET['status'] == 'logout')
    {
        $auth = new Auth();
        $auth->logout();
    }
}
elseif (isset($_POST['updateBtn']))
{
    $id = $_POST['id'];
    $student = new Student($_POST, $_FILES);
    $studentInfo = $student->getstudentInfoById($id);
    $student->updatestudentInfo($studentInfo);
}
elseif (isset($_POST['loginBtn']))
{
    $auth = new Auth($_POST);
    $message = $auth->login();
    include 'login.php';
}