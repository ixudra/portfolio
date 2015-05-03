<?php namespace Ixudra\Portfolio\Interfaces\Services\Html;


use Ixudra\Portfolio\Interfaces\Models\PersonInterface;

interface PersonViewFactory {

    public function index($input = array());

    public function create($input = null);

    public function show(PersonInterface $person);

    public function edit(PersonInterface $person, $input = null);

}
