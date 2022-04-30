<?php

namespace Crypto\Model;

class ExchangeRate extends Model
{

    protected $time;

    protected $asset_id_base;

    protected $asset_id_quote;

    protected $rate;

    
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
     * Get the value of asset_id_base
     */
    public function getAssetIdBase()
    {
        return $this->asset_id_base;
    }

    /**
     * Set the value of asset_id_base
     *
     * @return  self
     */
    public function setAssetIdBase($asset_id_base)
    {
        $this->asset_id_base = $asset_id_base;

        return $this;
    }

    /**
     * Get the value of asset_id_quote
     */
    public function getAssetIdQuote()
    {
        return $this->asset_id_quote;
    }

    /**
     * Set the value of asset_id_quote
     *
     * @return  self
     */
    public function setAssetIdQuote($asset_id_quote)
    {
        $this->asset_id_quote = $asset_id_quote;

        return $this;
    }

    /**
     * Get the value of rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    public function getRoundRate($decimals = 2)
    {
        return number_format($this->rate, $decimals);
    }
}