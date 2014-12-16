<?php
namespace Application\Mappers;

use Core\Application\Application;
use Application\Models\EntityTimeline;

class Timeline
{
    private $adapterName;
    private $id;
    
    /**
     * Constructor que al instanciar recibe el adapter
     */
    public function __construct() 
    {
        $config = Application::getConfig();
        $request = Application::getRequest();
        $this->setAdapterName($config['adapter']);
        if(isset($request['params']['id']))
            $this->setId($request['params']['id']);
    }
    
    public function setAdapterName($adapterName) 
    {
        $this->adapterName = $adapterName;
    }
    
    public function setId($id) 
    {
        $this->id = $id;
    }

    
    public function insertTimeline($data)
    {
        switch($this->adapterName){
            case'\Core\Adapters\Mysql':
                $adapter = new $this->adapterName();
                $adapter->setTable("TIMELINE");
                $result = $adapter->insert($data);
                            
                $adapter->disconnect();
                
                return $result;
        }
        
    }
}

