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
        {
            $users = $this->getOne($id);
            return $users;
        }
    }
    
    private function getOne($id)
    {
        $mapper = new UserMapper();
        $users = $mapper->fetchUser($id);
        return $users;
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
        
    public function delete($id)
    {
        $mapper = new UserMapper();
        $users = $mapper->deleteUser($id);
        return $users;
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