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
<<<<<<< HEAD
        
=======
        //FILA 1
>>>>>>> 633618991def07fd2fbed7ac34fb3fa3d9697765
        die("POST Method not implemented");
    }
    
    public function patch()
    {
<<<<<<< HEAD
        
=======
        //FILA 2
>>>>>>> 633618991def07fd2fbed7ac34fb3fa3d9697765
        die("PATCH Method not implemented");
    }
        
    public function delete($id)
    {
<<<<<<< HEAD
        
        die("DELETE Method not implemented");
=======
        $mapper = new UserMapper();
        $users = $mapper->deleteUser($id);
        return $users;
>>>>>>> 633618991def07fd2fbed7ac34fb3fa3d9697765
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