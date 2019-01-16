<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 16/01/2019
 * Time: 11:06
 */

class Videotheque
{
    private $serie;

    /**
     * Videotheque constructor.
     * @param $series
     */
    public function __construct($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getSeries()
    {
        return $this->serie;
    }

    /**
     * @param mixed $series
     */
    public function setSeries($series)
    {
        $this->serie = $serie;
    }

}