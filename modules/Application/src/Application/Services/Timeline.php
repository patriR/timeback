<?php
namespace Application\Services;

use Application\Mappers\Timeline as TimelineMapper;
/**
 * TODO No me reconoce el TimelineMapper
 */

class Timeline
{
    public function get($id=null)
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
        $mapper = new TimelineMapper();
        $mapper->setId($id);
        $data = $mapper->fetchTimeline();
        return $data;
    }
    
    public function post($data)
    {
    	$mapper = new TimelineMapper();
    	//FILA 1
    	$mapper->setId($id);
        $ok = $mapper->insertTimeline($data);
        if (!$ok)
        	die("POST Method failure");
    }
    
    /**
     * @param unknown_type $id
     * @param array $data
     */
    public function patch($id,$data)
    {
    	$mapper = new TimelineMapper();
        //FILA 2
        $mapper->setId($id);
        $ok = $mapper->updateTimeline($data);
        if (!$ok)
        	die("POST Method failure");
    }
        
    public function delete($id)
    {
    	$mapper = new TimelineMapper();
    	//FILA 3
        $mapper->setId($id);
        $ok = $mapper->deleteTimeline();
        if (!$ok)
        	die("POST Method failure");
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