<?php
namespace Application\Models;

use Core\Entity\HydrateInterface;

class EntityTimeline implements HydrateInterface
{
    private $id;
    protected $stardate;
    protected $enddate;
    private $headline;
    protected $text;
    public $media;
    public $mediacredit;
    public $mediacaption;
    public $mediathumbnail;
    public $type;
    public $tag;

    public function setId($id) {
        $this->id = $id;
    }

    public function setStardate($stardate) {
        $this->stardate = $stardate;
    }


    /**
     * @return the $stardate
     */
    public function getStardate()
    {
        return $this->stardate;
    }

 /**
     * @return the $enddate
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

 /**
     * @return the $headline
     */
    public function getHeadline()
    {
        return $this->headline;
    }

 /**
     * @return the $text
     */
    public function getText()
    {
        return $this->text;
    }

 /**
     * @return the $media
     */
    public function getMedia()
    {
        return $this->media;
    }

 /**
     * @return the $mediacredit
     */
    public function getMediacredit()
    {
        return $this->mediacredit;
    }

 /**
     * @return the $mediacaption
     */
    public function getMediacaption()
    {
        return $this->mediacaption;
    }

 /**
     * @return the $mediathumbnail
     */
    public function getMediathumbnail()
    {
        return $this->mediathumbnail;
    }

 /**
     * @return the $type
     */
    public function getType()
    {
        return $this->type;
    }

 /**
     * @return the $tag
     */
    public function getTag()
    {
        return $this->tag;
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
        $this->setId($data['iduser']);
        $this->setName($data['name']);
        $this->setLastname($data['lastname']) ;
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);
        $this->setDescription($data['description']);
        $this->setPhoto($data['photo']);
        $this->setGender($data['genders_idgender']);
        $this->setCity($data['cities_idcity']);
        $this->setPets($data['pets']);
        $this->setLanguages($data['languages']);
    }

    public function extract()
    {
        $user = array(
            'id' => $this->id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => $this->password,
            'description' => $this->description,
            'photo' => $this->photo,
            'gender' => $this->gender,
            'city' => $this->city,
            'pets' => $this->pets,
            'languages' => $this->languages
        );
        return $user;
    }
}