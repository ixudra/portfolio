<?php namespace Ixudra\Portfolio\Services\Html;


use Ixudra\Core\Services\Html\BaseViewFactory;
use Ixudra\Portfolio\Interfaces\Models\ProjectInterface;
use Ixudra\Portfolio\Interfaces\Repositories\ProjectRepositoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Form\CustomerFormHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Form\ProjectFormHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Form\ProjectTypeFormHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Html\ProjectViewFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Input\ProjectInputHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Validation\ProjectValidationHelperInterface;

use App;

class ProjectViewFactory extends BaseViewFactory implements ProjectViewFactoryInterface {

    public function index($input = array())
    {
        if( empty($input) ) {
            $input = array(
                'query'                 => '',
                'customer_id'           => '',
                'project_type_id'       => '',
                'shown'                 => '',
            );
        }

        return $this->prepareFilter( 'portfolio::projects.index', $input );
    }

    public function create($input = null)
    {
        $defaultInput = App::make( ProjectInputHelperInterface::class )->getDefaultInput();
        if( $input !== null ) {
            $defaultInput = array_merge(
                $defaultInput,
                $input
            );
        }

        return $this->prepareForm( 'portfolio::projects.create', 'create', $defaultInput );
    }

    public function show(ProjectInterface $project)
    {
        $this->addParameter('project', $project);

        return $this->makeView( 'portfolio::projects.show' );
    }

    public function edit(ProjectInterface $project, $input = null)
    {
        if( $input === null ) {
            $input = App::make( ProjectInputHelperInterface::class )->getInputForModel( $project );
        }

        $this->addParameter('project', $project);

        return $this->prepareForm('portfolio::projects.edit', 'update', $input);
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make( ProjectInputHelperInterface::class )->getInputForSearch( $input );
        $projects = App::make( ProjectRepositoryInterface::class )->search( $searchInput );

        $customers = App::make( CustomerFormHelperInterface::class )->getUsedAsSelectList(true);
        $projectTypes = App::make( ProjectTypeFormHelperInterface::class )->getAllAsSelectList(true);
        $visibilityOptions = App::make( ProjectFormHelperInterface::class )->getVisibilityOptionsAsSelectList(true);

        $this->addParameter('projects', $projects);
        $this->addParameter('customers', $customers);
        $this->addParameter('projectTypes', $projectTypes);
        $this->addParameter('visibilityOptions', $visibilityOptions);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $formName, $input)
    {
        $statuses = App::make( ProjectFormHelperInterface::class )->getStatusesAsSelectList();
        $projectTypes = App::make( ProjectTypeFormHelperInterface::class )->getAllAsSelectList();
        $customers = App::make( CustomerFormHelperInterface::class )->getAllAsSelectList();
        $requiredFields = App::make( ProjectValidationHelperInterface::class )->getRequiredFormFields( $formName );

        $this->addParameter('statuses', $statuses);
        $this->addParameter('customers', $customers);
        $this->addParameter('projectTypes', $projectTypes);
        $this->addParameter('input', $input);
        $this->addParameter('requiredFields', $requiredFields);

        return $this->makeView( $template );
    }

}
