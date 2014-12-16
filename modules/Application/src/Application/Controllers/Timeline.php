<?php
namespace Application\controllers;

use Application\Services;

// if(!isset($_SESSION['email']))    
//     header("Location: /home/select");

class Timeline
{    
    public $layout = null;
    
    public function index($id,$params)
    {
        $service = new Services\Timeline();
        $data = $service->{strtolower($_SERVER['REQUEST_METHOD'])}();

        echo json_encode($data);        
    }
    
}