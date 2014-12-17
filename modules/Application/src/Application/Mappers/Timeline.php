<?php
namespace Application\Mappers;

use Core\Application\Application;

class Timeline
{
    private $adapterName;
    
    /**
     * Constructor que al instanciar recibe el adapter
     */
    public function __construct() 
    {
        $config = Application::getConfig();
        $this->setAdapterName($config['adapter']);
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
}

