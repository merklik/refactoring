<?php
/**
 * Created by JetBrains PhpStorm.
 * User: merklik
 * Date: 4/27/13
 * Time: 7:12 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Refactoring;

require_once ('Price.php');


class Movie
{
    const CHILDRENS = 2;
    const REGULAR = 0;
    const NEW_RELEASE = 1;
    private $_title;
    private $_price;

    function __construct($title, $priceCode)
    {
        $this->_title = $title;
        $this->setPriceCode($priceCode);
    }

    public function setPriceCode($arg)
    {
        switch ($arg) {
            case Movie::REGULAR:
                $this->_price = new RegularPrice();
                break;
            case Movie::NEW_RELEASE:
                $this->_price = new NewRelasePrice();
                break;
            case Movie::CHILDRENS:
                $this->_price = new ChilderPrice();
                break;
        }
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function getFrequentRenterPoints($daysRented)
    {
        return $this->_price->getFrequentRenterPoints($daysRented);
    }

    public function getCharge($daysRented)
    {
        return $this->_price->getCharge($daysRented);
    }

}