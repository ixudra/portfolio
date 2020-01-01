<?php namespace Ixudra\Portfolio\Interfaces\Models;


interface CustomerModelInterface {

    public function getSingular();

    public function getPlural();

    public function getSortingName();

    public function getCorporateAddress();

    public function getBillingAddress();

}
