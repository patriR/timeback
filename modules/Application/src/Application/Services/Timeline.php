<?php
namespace Application\Services;


use Application\Mappers\Timeline as TimelineMapper;

class Timeline
{
    public function get($id = null)
    {
        if(!$id)
        {
            $mapper = new TimelineMapper();
            $data = $mapper->fetchAllTimeline();
            return $data;
        }
        else
            $this->getOne($id);
        
        die("GET Method not implemented");
    }
    
    private function getOne($id)
    {
        
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