<?php
/**
 * Created by JetBrains PhpStorm.
 * User: merklik
 * Date: 4/28/13
 * Time: 12:16 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Refactoring;


class Price
{
    public function getCharge($daysRented){}

    public function getFrequentRenterPoints($daysRented)
    {
        return 1;
    }
}

class ChilderPrice extends Price
{
    public function getPriceCode()
    {
        return MOVIE::CHILDRENS;
    }


    public function getCharge($daysRented)
    {
        $result = 1.5;
        if ($daysRented > 3)
            $result += ($daysRented - 3) * 1.5;

        return $result;
    }

}

class RegularPrice extends Price
{
    public function getPriceCode()
    {
        return MOVIE::REGULAR;
    }

    public function getCharge($daysRented)
    {
        $result = 2;
        if ($daysRented > 2)
            $result += ($daysRented - 2) * 1.5;

        return $result;
    }

}

class NewRelasePrice extends Price
{
    public function getPriceCode()
    {
        return MOVIE::NEW_RELEASE;
    }

    public function getCharge($daysRented)
    {
       return  $daysRented * 3;
    }

    public function getFrequentRenterPoints($daysRented)
    {
        if ($daysRented > 1) {
            return 2;
        }
        return 1;
    }

}