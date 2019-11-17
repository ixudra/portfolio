<?php namespace Ixudra\Portfolio\Services\Html;


use Ixudra\Core\Services\Html\BaseViewFactory;
use Ixudra\Portfolio\Interfaces\Models\PersonInterface;
use Ixudra\Portfolio\Interfaces\Repositories\PersonRepositoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Form\AddressFormHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Input\PersonInputHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Html\PersonViewFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Validation\PersonValidationHelperInterface;

use App;

class PersonViewFactory extends BaseViewFactory implements PersonViewFactoryInterface {

    public function index($input = array())
    {
        if( empty($input) ) {
            $input = array(
                'query'         => '',
            );
        }

        return $this->prepareFilter( 'portfolio::people.index', $input );
    }

    public function create($input = null)
    {
        if( $input === null ) {
            $input = App::make( PersonInputHelperInterface::class )->getDefaultInput();
        }

        return $this->prepareForm('portfolio::people.create', 'create', $input);
    }

    public function show(PersonInterface $person)
    {
        $this->addParameter('person', $person);

        return $this->makeView( 'portfolio::people.show' );
    }

    public function edit(PersonInterface $person, $input = null)
    {
        if( $input === null ) {
            $input = App::make( PersonInputHelperInterface::class )->getInputForModel( $person );
        }

        $this->addParameter('person', $person);

        return $this->prepareForm('portfolio::people.edit', 'update', $input);
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make( PersonInputHelperInterface::class )->getInputForSearch( $input );
        $people = App::make( PersonRepositoryInterface::class )->search( $searchInput );

        $this->addParameter('people', $people);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $formName, $input)
    {
        $countries = App::make( AddressFormHelperInterface::class )->getCountriesAsSelectList();

        $requiredFields = App::make( PersonValidationHelperInterface::class )->getRequiredFormFields( $formName );

        $this->addParameter('countries', $countries);
        $this->addParameter('input', $input);
        $this->addParameter('requiredFields', $requiredFields);
        $this->addParameter('prefix', '');

        return $this->makeView( $template );
    }

}
