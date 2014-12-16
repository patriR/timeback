<?php
namespace Application\Models;

use Core\Entity\HydrateInterface;

class EntityTimeline implements HydrateInterface
{
    private $id;
    protected $startdate;
    protected $enddate;
    protected $headline;
    protected $text;
    protected $media;
    protected $mediacredit;
    protected $mediacaption;
    protected $mediathumbnail;
    protected $type;
    protected $tag;
    
    /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param field_type $startdate
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    }

    /**
     * @param field_type $enddate
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;
    }

    /**
     * @param field_type $headline
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;
    }

    /**
     * @param field_type $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @param field_type $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }

    /**
     * @param field_type $mediacredit
     */
    public function setMediacredit($mediacredit)
    {
        $this->mediacredit = $mediacredit;
    }

    /**
     * @param field_type $mediacaption
     */
    public function setMediacaption($mediacaption)
    {
        $this->mediacaption = $mediacaption;
    }

    /**
     * @param field_type $mediathumbnail
     */
    public function setMediathumbnail($mediathumbnail)
    {
        $this->mediathumbnail = $mediathumbnail;
    }

    /**
     * @param field_type $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param field_type $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    
    public function hydrate($data)
    {
        $this->setId($data['id_timeline']);
        $this->setStartdate($data['start_date']);
        $this->setEnddate($data['end_date']);
        $this->setHeadline($data['headline']);
        $this->setText($data['text']);
        $this->setMedia($data['media']);
        $this->setMediacredit($data['media_credit']);
        $this->setMediacaption($data['media_caption']);
        $this->setMediathumbnail($data['media_thumbnail']);
        $this->setType($data['type']);
        $this->setTag($data['tag_id_tag']);
    }

    
    public function extract()
    {
        $timeline = array(
            'id' => $this->id,
            'startdate' => $this->startdate,
            'enddate' => $this->enddate,
            'headline' => $this->headline,
            'text' => $this->text,
            'media' => $this->media,
            'mediacredit' => $this->mediacredit,
            'mediacaption'=> $this->mediacaption,
            'mediathumbnail' => $this->mediathumbnail,
            'type' => $this->type,
            'tag' => $this->tag
        );
        return $timeline;
    }
}