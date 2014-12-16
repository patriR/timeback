<?php
namespace Application\Mappers;

use Core\Application\Application;
use Application\Models\EntityUser;

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
        
                $adapter = new $this->adapterName('Timeline');
                $adapter->setTable("TIMELINE");
                $timeline = $adapter->fetchAll();
                $adapter->setTable("TAG");
                $tags = $adapter->fetchAll();

                $timelineHidrated = array();

                for($i=0; $i < sizeof($timeline); $i++)
                {
                    $timelineHidrated = new EntityTimeline();
                    
                    foreach($tags as $tag)
                    {
                        if($tag['id_tag'] == $timeline[$i]['tag_id_tag'])
                        {
                            $timeline[$i]['tag_id_tag'] = $tag['tag_name'];
                        }
                    }
                    
                    $timelineHidrated->hydrate($timeline[$i]);
                    array_push($timelineHidrated, $timelineHidrated->extract());
                }

                $adapter->disconnect();

                return $timelineHidrated;
                break;
            case'\Core\Adapters\Txt':
                $adapter = new $this->adapterName();
                $data = $adapter->fetchAll();
                return $data;
                break;
        }
    }

    public function fetchTimeline()
    {
        switch($this->adapterName){
             
            case'\Core\Adapters\Mysql':
                $adapter = new $this->adapterName();
                $adapter->setTable("TIMELINE");
                $timeline = $adapter->fetch(array('id_timeline'=> $this->id));
                $adapter->setTable("TAG");
                $tags = $adapter->fetchAll();
               
                for($i=0; $i < sizeof($timeline); $i++)
                {
                    $timelineHidrated = new EntityTimeline();
                    
                    foreach($ags as $tag)
                    {
                    if($tag['id_tag'] == $timeline[$i]['tag_id_tag'])
                        {
                            $timeline[$i]['tag_id_tag'] = $tag['tag_name'];
                        }
                    }
                    $timelineHidrated->hydrate($timeline[$i]);
                }

                $adapter->disconnect();

                return $timelineHidrated->extract();
        }
    }

    public function insertTimeline()
    {

    }
    
    public function updateTimeline($id, $data)
    {
        switch($this->adapterName){
             
            case'\Core\Adapters\Mysql':
                $adapter = new $this->adapterName();
                $adapter->setTable("TIMELINE");
                $result = $adapter->update(array('id_timeline'=> $this->id,$data));
                
                $timelineHidrated = new EntityTimeline();
                $timelineHidrated->hydrate($timeline[$i]);
        
                $adapter->disconnect();
        
                return $result();
        }
    }
}

