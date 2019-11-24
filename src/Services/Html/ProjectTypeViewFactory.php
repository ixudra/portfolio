<?php namespace Ixudra\Portfolio\Services\Html;


use Ixudra\Core\Services\Html\BaseViewFactory;
use Ixudra\Portfolio\Interfaces\Models\ProjectTypeInterface;
use Ixudra\Portfolio\Interfaces\Repositories\ProjectTypeRepositoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Html\ProjectTypeViewFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Input\ProjectTypeInputHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Validation\ProjectTypeValidationHelperInterface;

use App;

class ProjectTypeViewFactory extends BaseViewFactory implements ProjectTypeViewFactoryInterface {

    public function index($input = array())
    {
        if( empty($input) ) {
            $input = array(
                'query'             => '',
            );
        }

        return $this->prepareFilter( 'portfolio::projectTypes.index', $input );
    }

    public function create($input = null)
    {
        if( $input === null ) {
            $input = App::make( ProjectTypeInputHelperInterface::class )->getDefaultInput();
        }

        return $this->prepareForm('portfolio::projectTypes.create', 'create', $input);
    }

    public function show(ProjectTypeInterface $projectType)
    {
        $this->addParameter('projectType', $projectType);

        return $this->makeView( 'portfolio::projectTypes.show' );
    }

    public function edit(ProjectTypeInterface $projectType, $input = null)
    {
        if( $input === null ) {
            $input = App::make( ProjectTypeInputHelperInterface::class )->getInputForModel( $projectType );
        }

        $this->addParameter('projectType', $projectType);

        return $this->prepareForm('portfolio::projectTypes.edit', 'update', $input);
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make( ProjectTypeInputHelperInterface::class )->getInputForSearch( $input );
        $projectTypes = App::make( ProjectTypeRepositoryInterface::class )->search( $searchInput );

        $this->addParameter('projectTypes', $projectTypes);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $formName, $input)
    {
        $requiredFields = App::make( ProjectTypeValidationHelperInterface::class )->getRequiredFormFields( $formName );

        $this->addParameter('input', $input);
        $this->addParameter('requiredFields', $requiredFields);

        return $this->makeView( $template );
    }

}
