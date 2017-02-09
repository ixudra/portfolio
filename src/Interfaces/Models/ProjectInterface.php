<?php namespace Ixudra\Portfolio\Interfaces\Models;


interface ProjectInterface {

    public function contractor();

    public function customer();

    public function projectType();

    public function image();

    public static function getRules();

    public static function getDefaults();

    public function delete();

}
