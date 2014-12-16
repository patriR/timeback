<?php
namespace Application\Models;

use Core\Entity\HydrateInterface;

class EntityUser implements HydrateInterface
{
    private $id;
    protected $start_date;
    protected $end_date;
    private $headline;
    protected $text;
    public $media;
    public $media_credit;
    public $media_caption;
    public $media_thumbnail;
    public $type;
    public $tags;

    public function setId($id) {
        $this->id = $id;
    }

    public function setStartDate($start_date) {
        $this->start_date = $start_date;
    }

    public function setEndDate($end_date) {
        $this->end_date = $end_date;
    }
    
    public function setHeadline($headline) {
        $this->headline = $headline;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function setMedia($media) {
        $this->media = $media;
    }

    public function setMediaCredit($mediacredit) {
        $this->media_credit = $mediacredit;
    }

    public function setMediaCaption($mediacaption) {
        $this->media_caption = $mediacaption;
    }

    public function setMediaThumbnail($mediathumbnail) {
        $this->media_thumbnail = $mediathumbnail;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setTags($tags) {
        $this->tags = $tags;
    }

    public function hydrate($data)
    {
        $this->setId($data['id_timeline']);
        $this->setStartDate($data['start_date']);
        $this->setEndDate($data['end_date']) ;
        $this->setHeadline($data['headline']);
        $this->setText($data['text']);
        $this->setMedia($data['media']);
        $this->setMediaCredit($data['media_credit']);
        $this->setMediaCaption($data['media_caption']);
        $this->setMediaThumbnail($data['media_thumbnail']);
        $this->setType($data['type']);
        $this->setTags($data['tags']);
    }

    public function extract()
    {
        $timeline = array(
            'id' => $this->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'headline' => $this->headline,
            'text' => $this->text,
            'media' => $this->media,
            'media_credit' => $this->media_credit,
            'media_caption' => $this->media_caption,
            'media_thumbnail' => $this->media_thumbnail,
            'type' => $this->type,
            'tags' => $this->tags
        );
        return $timeline;
    }
}