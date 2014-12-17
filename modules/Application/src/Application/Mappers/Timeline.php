<?php
namespace Application\Mappers;

use Core\Application\Application;

//use Application\Models\EntityTimeline;


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
    

    /**
    * 
    * @return array de Timelines
    */
    public function fetchAllTimelines()
    {
        $adapter = new $this->adapterName();
        if(method_exists($adapter, 'setTable'))
        {
            $adapter->setTable('timeline');
        }
        return $adapter->fetchAll();
    }
    
    public function fetchTimeline()
    {
        $adapter = new $this->adapterName();
        if(method_exists($adapter, 'setTable'))
        {
            $adapter->setTable('timeline');
        }
        return $adapter->fetch($id);
    }
    
    public function insertTimeline()
    {

    }

    public function updateTimeline()
    {

    }
    
    public function deleteTimeline($id)
    {
        $adapter = new $this->adapterName();
        if(method_exists($adapter, 'setTable'))
        {
            $adapter->setTable('timeline');
        }
        return $adapter->delete($id);
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

