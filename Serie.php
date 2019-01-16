<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 16/01/2019
 * Time: 10:26
 */

class Serie
{
    private $name;
    private $type;
    private $fav;
    private $nbSeason;
    private $image;
    private $note;
    private $avis;

    /**
     * Serie constructor.
     * @param $name
     * @param $type
     * @param $fav
     * @param $nbSeason
     * @param $image
     * @param $note
     * @param $avis
     */
    public function __construct($name, $type, $fav, $nbSeason, $image = false, $note = false, $avis = false)
    {
        $this->name = $name;
        $this->type = $type;
        $this->fav = $fav;
        $this->nbSeason = $nbSeason;
        $this->image = $image;
        $this->note = $note;
        $this->avis = $avis;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getFav()
    {
        return $this->fav;
    }

    /**
     * @param mixed $fav
     */
    public function setFav($fav)
    {
        $this->fav = $fav;
    }

    /**
     * @return mixed
     */
    public function getNbSeason()
    {
        return $this->nbSeason;
    }

    /**
     * @param mixed $nbSeason
     */
    public function setNbSeason($nbSeason)
    {
        $this->nbSeason = $nbSeason;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $note
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * @param mixed $note
     */
    public function setAvis($avis)
    {
        $this->avis = $avis;
    }
}