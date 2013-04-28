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
     public function getPriceCode(){}

    public function getCharge($daysRented)
    {
        $result = 0;

        switch ($this->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($daysRented > 2)
                    $result += ($daysRented - 2) * 1.5;
                break;
            case Movie::NEW_RELEASE:
                $result += $daysRented * 3;
                break;
            case Movie::CHILDRENS:
                $result += 1.5;
                if ($daysRented > 3)
                    $result += ($daysRented - 3) * 1.5;
                break;

        }
        return $result;
    }

    public function getFrequentRenterPoints($daysRented)
    {
        if (($this->getPriceCode() == Movie::NEW_RELEASE)
            &&
            $daysRented > 1
        ) {
            return 2;
        }
        return 1;
    }
}

class ChilderPrice extends Price
{
    public function getPriceCode()
    {
        return MOVIE::CHILDRENS;
    }

}

class RegularPrice extends Price
{
    public function getPriceCode()
    {
        return MOVIE::REGULAR;
    }

}

class NewRelasePrice extends Price
{
    public function getPriceCode()
    {
        return MOVIE::NEW_RELEASE;
    }

}