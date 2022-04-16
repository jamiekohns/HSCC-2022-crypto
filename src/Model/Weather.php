<?php

namespace Crypto\Model;

class Weather extends Model
{
    protected $consolidated_weather;

    protected $time;

    protected $sun_rise;

    protected $sun_set;

    protected $title;

    protected $location_type;

    protected $woeid;

    protected $latt_long;

    protected $timezone;

    /**
     * Get the value of consolidated_weather
     */
    public function getConsolidatedWeather()
    {
        return $this->consolidated_weather;
    }

    /**
     * Set the value of consolidated_weather
     *
     * @return  self
     */
    public function setConsolidatedWeather($consolidated_weather)
    {
        $this->consolidated_weather = $consolidated_weather;

        return $this;
    }

    /**
     * Get the value of time
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set the value of time
     *
     * @return  self
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get the value of sun_rise
     */
    public function getSunRise()
    {
        return $this->sun_rise;
    }

    /**
     * Set the value of sun_rise
     *
     * @return  self
     */
    public function setSunRise($sun_rise)
    {
        $this->sun_rise = $sun_rise;

        return $this;
    }

    /**
     * Get the value of sun_set
     */
    public function getSunSet()
    {
        return $this->sun_set;
    }

    /**
     * Set the value of sun_set
     *
     * @return  self
     */
    public function setSunSet($sun_set)
    {
        $this->sun_set = $sun_set;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of location_type
     */
    public function getLocationType()
    {
        return $this->location_type;
    }

    /**
     * Set the value of location_type
     *
     * @return  self
     */
    public function setLocationType($location_type)
    {
        $this->location_type = $location_type;

        return $this;
    }

    /**
     * Get the value of woeid
     */
    public function getWoeid()
    {
        return $this->woeid;
    }

    /**
     * Set the value of woeid
     *
     * @return  self
     */
    public function setWoeid($woeid)
    {
        $this->woeid = $woeid;

        return $this;
    }

    /**
     * Get the value of latt_long
     */
    public function getLattLong()
    {
        return $this->latt_long;
    }

    /**
     * Set the value of latt_long
     *
     * @return  self
     */
    public function setLattLong($latt_long)
    {
        $this->latt_long = $latt_long;

        return $this;
    }

    /**
     * Get the value of timezone
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set the value of timezone
     *
     * @return  self
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getCurrentWeather()
    {
        $consolidated = $this->getConsolidatedWeather();
        
        return array_shift($consolidated);
    }

    public function getCurrentTemp()
    {
        $current = $this->getCurrentWeather();

        return $this->convertCtoF($current['the_temp']);
    }

    private function convertCtoF($temp)
    {
        return round($temp * 9 / 5 + 32);
    }
}