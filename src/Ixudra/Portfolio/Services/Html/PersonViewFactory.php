<?php namespace Ixudra\Portfolio\Services\Html;


use App;

use Ixudra\Core\Services\Html\BaseViewFactory;
use Ixudra\Portfolio\Models\Person;

class PersonViewFactory extends BaseViewFactory {

    public function index($input = array())
    {
        if( empty($input) ) {
            $input = array(
                'query'         => ''
            );
        }

        return $this->prepareFilter( 'portfolio::people.index', $input );
    }

    public function create($input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Services\Input\PersonInputHelper')->getDefaultInput();
        }

        return $this->prepareForm('portfolio::people.create', 'create', $input);
    }

    public function show(Person $person)
    {
        $this->addParameter('person', $person);

        return $this->makeView( 'portfolio::people.show' );
    }

    public function edit(Person $person, $input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Services\Input\PersonInputHelper')->getInputForModel( $person );
        }

        $this->addParameter('person', $person);

        return $this->prepareForm('portfolio::people.edit', 'update', $input);
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make('\Ixudra\Portfolio\Services\Input\PersonInputHelper')->getInputForSearch( $input );
        $people = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository')->search( $searchInput );

        $this->addParameter('people', $people);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $formName, $input)
    {
        $countries = App::make('\Ixudra\Portfolio\Services\Form\AddressFormHelper')->getCountriesAsSelectList();

        $requiredFields = App::make('\Ixudra\Portfolio\Services\Validation\PersonValidationHelper')->getRequiredFormFields( $formName );

        $this->addParameter('countries', $countries);
        $this->addParameter('input', $input);
        $this->addParameter('requiredFields', $requiredFields);
        $this->addParameter('prefix', '');

        return $this->makeView( $template );
    }

}
