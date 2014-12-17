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

     /**
     * 
     * @return array de users
     */
    public function fetchAllTimeline()
    {
        switch($this->adapterName){
           
            case'\Core\Adapters\Mysql':
                
                $adapter = new $this->adapterName();
                
                $adapter->setTable("timeline");
                $timeline = $adapter->fetchAll();
                
                $adapter->setTable("tag");
                $tag = $adapter->fetchAll();
                
                $timelineHidrateds = array();

                for($i=0; $i < sizeof($timeline); $i++)
                {
                	/**
                	 * TODO Falta el idTag con el Title del Media
                	 */
                    $timelineHidrated = new EntityTimeline();                    
                    $timelineHidrated->hydrate($timeline[$i]);
                    array_push($timelineHidrateds, $timelineHidrated->extract());
                }

                $adapter->disconnect();

                return $timelineHidrateds;
            break;
            case'\Core\Adapters\Txt':
                $adapter = new $this->adapterName();
                $timeline = $adapter->fetchAll();
                return $timeline;
            break;
        }
    }

    
    public function fetchTimeline()
    {
        switch($this->adapterName){
            case'\Core\Adapters\Mysql':
                $adapter = new $this->adapterName();
                $adapter->setTable("timeline");
                $timeline = $adapter->fetch(array('id_timeline'=> $this->id));
                /**
                 * TODO Falta el idTag con el Title del Media
                */
                $timelineHidrated = new EntityTimeline();
                /*echo '<pre>';
                print_r($timeline);
                echo '</pre>';*/
                $timelineHidrated->hydrate($timeline[0]);
                $adapter->disconnect();
                return $timelineHidrated->extract();
        }
    }

   
    /**
     * @param array $data
     */
    public function insertTimeline($data)
    {
    	switch($this->adapterName){
    		case'\Core\Adapters\Mysql':
    			$adapter = new $this->adapterName();
    			$adapter->setTable("timeline");
    			/**
    			 * TODO Relacion entre el nombre de las variables de la entity y el de la tabla
    			 */
    			$timeline = $adapter->insert(array('id_timeline'=> $this->id));
    			/**
    			 * TODO Falta el idTag con el Title del Media
    			 */
    			$timelineHidrated = new EntityTimeline();
    			$timelineHidrated->hydrate($timeline);
    			$adapter->disconnect();
    			return $timeline;
    	}
    }
    
    /**
     * @param none, use before setId()
     * @return unknown
     */
    public function deleteTimeline()
    {
    	switch($this->adapterName){
    		case'\Core\Adapters\Mysql':
    			$adapter = new $this->adapterName();
    			$adapter->setTable("timeline");
    			/**
    			 * TODO Relacion entre el nombre de las variables de la entity y el de la tabla
    			*/
    			$timeline = $adapter->delete(array('id_timeline'=> $this->id));
    			/**
    			 * TODO Falta el idTag con el Title del Media
    			 */
    			$adapter->disconnect();
    			return $timeline;
    	}
    }
    
	/**
	 * @param use before setId()
     * @param array $data
     */
    public function updateTimeline($data)
    {
        echo 'data'.print_r($data);
    	switch($this->adapterName){
    	    
    		case'\Core\Adapters\Mysql':
    			$adapter = new $this->adapterName();
    			$adapter->setTable("timeline");
    			
    			/**
    			 * TODO Relacion entre el nombre de las variables de la entity y el de la tabla
    			 */
    			$result = $adapter->update(array('id_timeline'=> $this->id),$data);
    			/**
    			 * TODO Falta el idTag con el Title del Media
    			 */
    			$adapter->disconnect();
    			return $result;
    	}
    }
    
    
}
