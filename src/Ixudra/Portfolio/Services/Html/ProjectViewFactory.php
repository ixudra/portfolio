<?php namespace Ixudra\Portfolio\Services\Html;


use App;

use Ixudra\Core\Services\Html\BaseViewFactory;

use Ixudra\Portfolio\Models\Project;

class ProjectViewFactory extends BaseViewFactory {

    public function index($input = array())
    {
        if( empty($input) ) {
            $input = array(
                'customer_id'           => '',
                'contractor_id'         => '',
                'project_type_id'       => ''
            );
        }

        return $this->prepareFilter( 'portfolio::projects.index', $input );
    }

    public function create($input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Services\Input\ProjectInputHelper')->getDefaultInput();
        }

        return $this->prepareForm( 'portfolio::projects.create', $input );
    }

    public function show(Project $project)
    {
        $this->addParameter('project', $project);

        return $this->makeView( 'portfolio::projects.show' );
    }

    public function edit(Project $project, $input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Services\Input\ProjectInputHelper')->getInputForModel( $project );
        }

        $this->addParameter('project', $project);

        return $this->prepareForm( 'portfolio::projects.edit', $input );
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make('\Ixudra\Portfolio\Services\Input\ProjectInputHelper')->getInputForSearch( $input );
        $projects = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository')->search( $searchInput, 25 );

        $projectTypes = App::make('\Ixudra\Portfolio\Services\Form\ProjectTypeFormHelper')->getAllAsSelectList(true);
        $customers = App::make('\Ixudra\Portfolio\Services\Form\CustomerFormHelper')->getUsedAsSelectList(true);

        $this->addParameter('projects', $projects);
        $this->addParameter('projectTypes', $projectTypes);
        $this->addParameter('customers', $customers);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $input)
    {
        $statuses = App::make('\Ixudra\Portfolio\Services\Form\ProjectFormHelper')->getStatusesAsSelectList();
        $projectTypes = App::make('\Ixudra\Portfolio\Services\Form\ProjectTypeFormHelper')->getAllAsSelectList();
        $customers = App::make('\Ixudra\Portfolio\Services\Form\CustomerFormHelper')->getAllAsSelectList();

        $this->addParameter('statuses', $statuses);
        $this->addParameter('projectTypes', $projectTypes);
        $this->addParameter('customers', $customers);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

}
