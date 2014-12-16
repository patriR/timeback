<?php
namespace Application\Services;


use Application\Mappers\Users as UserMapper;

class Users
{
    public function get($id=null)
    {
        if(!$id)
        {
            $mapper = new UserMapper();
            $users = $mapper->fetchAllUsers();
            return $users;
        }
        else
            $this->getOne($id);
    }
    
    private function getOne($id)
    {
        echo "Hola!!";
        die;
    }
    
    public function post($data)
    {
        //FILA 1
        die("POST Method not implemented");
    }
    
    public function patch()
    {
        //FILA 2
        die("PATCH Method not implemented");
    }
        
    public function delete()
    {
        //FILA 3
        die("DELETE Method not implemented");
    }
    
    public function options()
    {
        die("OPTIONS Method not implemented");
    }
    
    public function put()
    {
        die("PUT Method not implemented");
    }
    
    
}