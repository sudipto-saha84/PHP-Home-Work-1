<?php

namespace App\classes;

class View
{
    public function index()
    {
        header('Location: pages/action.php?status=index');
    }
}