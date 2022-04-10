<?php

namespace App\classes;

class Student
{
    private $name;
    private $mobile;
    private $email;
    private $imageName;
    private $directory;
    private $file;
    private $link;
    private $sql;
    private $queryResult;
    private $row;
    private $data = [];
    private $i;
    private $imgUrl;
    public static $con;

    public function __construct($data = null, $file = null)
    {
        if ($data)
        {
            $this->name         = $data['name'];
            $this->mobile        = $data['mobile'];
            $this->email        = $data['email'];
        }
        if ($file)
        {
            $this->file = $file;
        }
    }
    protected function getImageUrl()
    {
        $this->imageName = $this->file['image']['name'];
        $this->directory = '../assets/img/'.$this->imageName;
        move_uploaded_file($this->file['image']['tmp_name'], $this->directory);
        return $this->directory;
    }
    public function save()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'students');
        if ($this->link)
        {
            if (empty($this->file['image']['name']))
            {
                $this->imgUrl = '';
            }
            else
            {
                $this->imgUrl = $this->getImageUrl();
            }
            $this->sql = "INSERT INTO students (name, mobile, email,image) VALUES ('$this->name', '$this->mobile', '$this->email','$this->imgUrl')";
            if (mysqli_query($this->link, $this->sql))
            {
                return 'Student Info Created Successfully';
            }
            else
            {
                die('Query Problem...'.mysqli_error($this->link));
            }
        }
    }
    public function getAllStudentInfo()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'students');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM students";
            if (mysqli_query($this->link, $this->sql))
            {
                $this->queryResult = mysqli_query($this->link, $this->sql);
                $this->i = 0;
                while ($this->row = mysqli_fetch_assoc($this->queryResult))
                {
                    $this->data[$this->i]['id'] = $this->row ['id'];
                    $this->data[$this->i]['name'] = $this->row ['name'];
                    $this->data[$this->i]['mobile'] = $this->row ['mobile'];
                    $this->data[$this->i]['email'] = $this->row ['email'];
                    $this->data[$this->i]['image'] = $this->row ['image'];
                    $this->i++;
                }
                return $this->data;
            }
            else
            {
                die('Query Problem...'.mysqli_error($this->link));
            }
        }
    }
    public function getStudentInfoById($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'students');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM students WHERE id ='$id' ";
            if (mysqli_query($this->link, $this->sql))
            {
                $this->queryResult = mysqli_query($this->link, $this->sql);
                return mysqli_fetch_assoc($this->queryResult);
            }
            else
            {
                die('Query Problem...'.mysqli_error($this->link));
            }
        }
    }
    public function updateStudentInfo($studentInfo)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'students');
        if ($this->link)
        {
            if (empty($this->file['image']['name']))
            {
                $this->imgUrl = $studentInfo['image'];
            }
            else
            {
                if (file_exists($studentInfo['image']))
                {
                    unlink($studentInfo['image']);
                }
                $this->imgUrl = $this->getImageUrl();
            }
            $this->sql = "UPDATE students SET name ='$this->name', mobile= '$this->mobile', email='$this->email', image='$this->imgUrl' WHERE id = '$studentInfo[id]' ";

            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION ['message'] = 'Student Info Update Successfully.';
                header("Location: action.php?status=manage");
            }
            else
            {
                die('Query Problem...'.mysqli_error($this->link));
            }
        }
    }
    public function deleteStudentInfo($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'students');
        if ($this->link)
        {
            $this->row = $this->getStudentInfoById($id);
            if (file_exists($this->row['image']))
            {
                unlink($this->row['image']);
            }
            $this->sql = "DELETE FROM students WHERE id = '$id' ";
            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION['message'] = "Student Info Deleted Successfully.";
                header("Location: action.php?status=manage");
            }
            else
            {
                die('Query Problem...'.mysqli_error($this->link));
            }
        }
    }
}