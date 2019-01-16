<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 16/01/2019
 * Time: 11:06
 */

class Videotheque
{
    private $series;

    /**
     * Videotheque constructor.
     * @param $series
     */
    public function __construct($series)
    {
        $this->series = $series;
    }

    /**
     * @return mixed
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param mixed $series
     */
    public function setSeries($series)
    {
        $this->series = $series;
    }

}