<?php

namespace Crypto\Model;

class Symbol extends Model
{
    protected $symbol_id;
    protected $exchange_id;
    protected $symbol_type;
    protected $asset_id_base;
    protected $asset_id_quote;
    protected $price;

    /**
     * Get the value of symbol_id
     */
    public function getSymbolId()
    {
        return $this->symbol_id;
    }

    /**
     * Set the value of symbol_id
     *
     * @return  self
     */
    public function setSymbolId($symbol_id)
    {
        $this->symbol_id = $symbol_id;

        return $this;
    }

    /**
     * Get the value of exchange_id
     */
    public function getExchangeId()
    {
        return $this->exchange_id;
    }

    /**
     * Set the value of exchange_id
     *
     * @return  self
     */
    public function setExchangeId($exchange_id)
    {
        $this->exchange_id = $exchange_id;

        return $this;
    }

    /**
     * Get the value of symbol_type
     */
    public function getSymbolType()
    {
        return $this->symbol_type;
    }

    /**
     * Set the value of symbol_type
     *
     * @return  self
     */
    public function setSymbolType($symbol_type)
    {
        $this->symbol_type = $symbol_type;

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
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

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

    
    public function getSymbolExchangeRate($decimals = 2): string
    {
        $price =  number_format($this->price, $decimals);

        return sprintf(
            '%s to %s: %s',
            $this->asset_id_base,
            $this->asset_id_quote,
            $price
        );
    }

}