<?php namespace Ixudra\Portfolio\Services\Html;


use Ixudra\Core\Services\Html\BaseViewFactory;
use Ixudra\Portfolio\Interfaces\Services\Html\ProjectViewFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\ProjectInterface;

use App;

class ProjectViewFactory extends BaseViewFactory implements ProjectViewFactoryInterface {


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
            $input = App::make('\Ixudra\Portfolio\Interfaces\Services\Input\ProjectInputHelperInterface')->getDefaultInput();
        }

        return $this->prepareForm('portfolio::projects.create', 'create', $input);
    }

    public function show(ProjectInterface $project)
    {
        $this->addParameter('project', $project);

        return $this->makeView( 'portfolio::projects.show' );
    }

    public function edit(ProjectInterface $project, $input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Interfaces\Services\Input\ProjectInputHelperInterface')->getInputForModel( $project );
        }

        $this->addParameter('project', $project);

        return $this->prepareForm('portfolio::projects.edit', 'update', $input);
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make('\Ixudra\Portfolio\Interfaces\Services\Input\ProjectInputHelperInterface')->getInputForSearch( $input );
        $projects = App::make('\Ixudra\Portfolio\Interfaces\Repositories\ProjectRepositoryInterface')->search( $searchInput );

        $customers = App::make('\Ixudra\Portfolio\Interfaces\Services\Form\CustomerFormHelperInterface')->getUsedAsSelectList(true);
        $projectTypes = App::make('\Ixudra\Portfolio\Interfaces\Services\Form\ProjectTypeFormHelperInterface')->getAllAsSelectList(true);
        $visibilityOptions = App::make('\Ixudra\Portfolio\Interfaces\Services\Form\ProjectFormHelperInterface')->getVisibilityOptionsAsSelectList(true);

        $this->addParameter('projects', $projects);
        $this->addParameter('customers', $customers);
        $this->addParameter('projectTypes', $projectTypes);
        $this->addParameter('visibilityOptions', $visibilityOptions);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $formName, $input)
    {
        $statuses = App::make('\Ixudra\Portfolio\Interfaces\Services\Form\ProjectFormHelperInterface')->getStatusesAsSelectList();
        $projectTypes = App::make('\Ixudra\Portfolio\Interfaces\Services\Form\ProjectTypeFormHelperInterface')->getAllAsSelectList();
        $customers = App::make('\Ixudra\Portfolio\Interfaces\Services\Form\CustomerFormHelperInterface')->getAllAsSelectList();
        $requiredFields = App::make('\Ixudra\Portfolio\Interfaces\Services\Validation\ProjectValidationHelperInterface')->getRequiredFormFields( $formName );

        $this->addParameter('statuses', $statuses);
        $this->addParameter('customers', $customers);
        $this->addParameter('projectTypes', $projectTypes);
        $this->addParameter('input', $input);
        $this->addParameter('requiredFields', $requiredFields);

        return $this->makeView( $template );
    }

}
