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
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $rentals = $this->_rentals;

        $result = "Rental Record for " . $this->getName() . "\n";

        foreach ($rentals as $each) {
            //determine amounts for each line
            $totalAmount += $each->getCharge();

            // add frequent renter points
            $frequentRenterPoints++;

            // add bonus for a two day new release rental
            if (($each->getMovie()->getPriceCode() == Movie::NEW_RELEASE)
                &&
                $each->getDaysRented() > 1
            )
                $frequentRenterPoints++;


            //show figures for this rental
            $result .= "\t" . $each->getMovie()->getTitle() . "\t" . $each->getCharge() . "\n";

        }
        //add footer lines
        $result .= "Amount owed is " . $totalAmount . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points";


        return $result;
    }

    /**
     * @param $rental
     * @return float|int
     */
    public function getCharge(Rental $rental)
    {
        return $rental->getCharge();
    }
}



        