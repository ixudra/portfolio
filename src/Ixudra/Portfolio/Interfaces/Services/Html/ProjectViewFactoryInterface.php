<?php namespace Ixudra\Portfolio\Interfaces\Services\Html;


use Ixudra\Portfolio\Interfaces\Models\ProjectInterface;

interface ProjectViewFactoryInterface {

    public function index($input = array());

    public function create($input = null);

    public function show(ProjectInterface $project);

    public function edit(ProjectInterface $project, $input = null);

}
