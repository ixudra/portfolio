<?php namespace Ixudra\Portfolio\Interfaces\Models;


use Ixudra\Portfolio\Models\CustomerModelInterface;

interface CompanyInterface extends CustomerModelInterface {

    public function corporateAddress();

    public function billingAddress();

    public function representative();

    public function projects();

    public static function getRules();

    public static function getDefaults();

    public function delete();

    public function getSingular();

    public function getPlural();

    public function getSortingName();

}
