<?php namespace Ixudra\Portfolio\Interfaces\Models;


interface PersonInterface {

    public function address();

    public function company();

    public function projects();

    public static function getRules();

    public static function getDefaults();

    public function delete();

    public function getSingular();

    public function getPlural();

    public function getSortingName();

}
