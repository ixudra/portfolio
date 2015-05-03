<?php namespace Ixudra\Portfolio\Interfaces\Models;


interface CustomerInterface {

    public function object();

    public function projects();

    public static function getRules();

    public static function getDefaults();

    public function delete();

}
