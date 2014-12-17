<?php
namespace Application\Services;

use Application\Mappers\Timeline as TimelineMapper;

class Timeline
{
    public function get($id = null)
    {
        if (!$id) {
            $mapper = new TimelineMapper();
            $data = $mapper->fetchAllTimeline();
            return $data;
        } else {
            $data = $this->getOne($id);
            return $data;
        }
    }
    
    private function getOne($id)
    {
        die("GET one Method not implemented");
    }
    
    public function post($data)
    {
<<<<<<< HEAD
        
        die("POST Method not implemented");
=======
        $mapper = new TimelineMapper();
        $result = $mapper->insertTimeline($data);
        return $result;
>>>>>>> 633618991def07fd2fbed7ac34fb3fa3d9697765
    }
    
    public function patch($id,$data)
    {
<<<<<<< HEAD
        if($id)
        {
            $mapper = new TimelineMapper();
            $result = $mapper->updateTimeline($id,$data);
            return $result;
        }
        else
            die("PATCH Method not implemented");
=======
        //FILA 2
        die("PATCH Method not implemented");
>>>>>>> 633618991def07fd2fbed7ac34fb3fa3d9697765
    }
        
    public function delete($id)
    {
<<<<<<< HEAD
       
        die("DELETE Method not implemented");
=======
        $mapper = new TimelineMapper(array('id_timeline' => $id));
        $timeline = $mapper->delete($id);
        return $timeline;
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