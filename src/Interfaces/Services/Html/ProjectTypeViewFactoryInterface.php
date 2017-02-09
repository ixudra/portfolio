<?php namespace Ixudra\Portfolio\Interfaces\Services\Html;


use Ixudra\Portfolio\Interfaces\Models\ProjectTypeInterface;

interface ProjectTypeViewFactoryInterface {

    public function index($input = array());

    public function create($input = null);

    public function show(ProjectTypeInterface $projectType);

    public function edit(ProjectTypeInterface $projectType, $input = null);

}
