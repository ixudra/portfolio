<?php namespace Ixudra\Portfolio\Services\Html;


use App;

use Ixudra\Core\Services\Html\BaseViewFactory;

use Ixudra\Portfolio\Models\Project;
use Ixudra\Portfolio\Services\Form\ProjectFormHelper;

class ProjectViewFactory extends BaseViewFactory {

    protected $projectFormHelper;


    public function __construct(ProjectFormHelper $projectFormHelper)
    {
        $this->projectFormHelper = $projectFormHelper;
    }


    public function index($input = array())
    {
        if( empty($input) ) {
            $input = array(
                'query'                 => '',
                'customer_id'           => '',
                'project_type_id'       => '',
                'shown'                 => ''
            );
        }

        return $this->prepareFilter( 'portfolio::projects.index', $input );
    }

    public function create($input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Services\Input\ProjectInputHelper')->getDefaultInput();
        }

        return $this->prepareForm('portfolio::projects.create', 'create', $input);
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

        return $this->prepareForm('portfolio::projects.edit', 'update', $input);
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make('\Ixudra\Portfolio\Services\Input\ProjectInputHelper')->getInputForSearch( $input );
        $projects = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository')->search( $searchInput );

        $customers = App::make('\Ixudra\Portfolio\Services\Form\CustomerFormHelper')->getUsedAsSelectList(true);
        $projectTypes = App::make('\Ixudra\Portfolio\Services\Form\ProjectTypeFormHelper')->getAllAsSelectList(true);
        $visibilityOptions = App::make('\Ixudra\Portfolio\Services\Form\ProjectFormHelper')->getVisibilityOptionsAsSelectList(true);

        $this->addParameter('projects', $projects);
        $this->addParameter('customers', $customers);
        $this->addParameter('projectTypes', $projectTypes);
        $this->addParameter('visibilityOptions', $visibilityOptions);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $formName, $input)
    {
        $statuses = $this->projectFormHelper->getStatusesAsSelectList();
        $projectTypes = App::make('\Ixudra\Portfolio\Services\Form\ProjectTypeFormHelper')->getAllAsSelectList();
        $customers = App::make('\Ixudra\Portfolio\Services\Form\CustomerFormHelper')->getAllAsSelectList();
        $requiredFields = $this->projectFormHelper->getRequiredFields( $formName );

        $this->addParameter('statuses', $statuses);
        $this->addParameter('customers', $customers);
        $this->addParameter('projectTypes', $projectTypes);
        $this->addParameter('input', $input);
        $this->addParameter('requiredFields', $requiredFields);

        return $this->makeView( $template );
    }

}
