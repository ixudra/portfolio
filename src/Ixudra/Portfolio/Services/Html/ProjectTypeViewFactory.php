<?php namespace Ixudra\Portfolio\Services\Html;


use App;

use Ixudra\Core\Services\Html\BaseViewFactory;

use Ixudra\Portfolio\Models\ProjectType;

class ProjectTypeViewFactory extends BaseViewFactory {

    public function index($input = array())
    {
        if( empty($input) ) {
            $input = array(
                'name'              => ''
            );
        }

        return $this->prepareFilter( 'portfolio::projectTypes.index', $input );
    }

    public function create($input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Services\Input\ProjectTypeInputHelper')->getDefaultInput();
        }

        return $this->prepareForm( 'portfolio::projectTypes.create', $input );
    }

    public function show(ProjectType $projectType)
    {
        $this->addParameter('projectType', $projectType);

        return $this->makeView( 'portfolio::projectTypes.show' );
    }

    public function edit(ProjectType $projectType, $input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Services\Input\ProjectTypeInputHelper')->getInputForModel( $projectType );
        }

        $this->addParameter('projectType', $projectType);

        return $this->prepareForm( 'portfolio::projectTypes.edit', $input );
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make('\Ixudra\Portfolio\Services\Input\ProjectTypeInputHelper')->getInputForSearch( $input );
        $projectTypes = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository')->search( $searchInput, 25 );

        $this->addParameter('projectTypes', $projectTypes);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $input)
    {
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

}
