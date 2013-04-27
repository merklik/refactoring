<?php
/**
 * Created by JetBrains PhpStorm.
 * User: merklik
 * Date: 4/27/13
 * Time: 10:50 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Refactoring;


class Customer
{
    private $_name;
    private $_rentals = array();

    function __construct($name)
    {
        $this->_name = $name;
    }

    public function addRental(Rental $arg)
    {
        $this->_rentals[] = $arg;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function statement()
    {
        $result = "Rental Record for " . $this->getName() . "\n";

        foreach ($this->_rentals as $each) {
            //show figures for this rental
            $result .= "\t" . $each->getMovie()->getTitle() . "\t" . $each->getCharge() . "\n";

        }
        //add footer lines
        $result .= "Amount owed is " . $this->getTotalAmount() . "\n";
        $result .= "You earned " . $this->getTotalFrequenterPoints() . " frequent renter points";

        return $result;
    }

    private function getTotalAmount()
    {
        $totalAmount = 0;
        foreach ($this->_rentals as $each) {
            $totalAmount += $each->getCharge();
        }
        return $totalAmount;
    }

    private function getTotalFrequenterPoints()
    {
        $frequentRenterPoints = 0;
        foreach ($this->_rentals as $each) {
            $frequentRenterPoints += $each->getFrequentRenterPoints();

        }
        return $frequentRenterPoints;
    }
}



        