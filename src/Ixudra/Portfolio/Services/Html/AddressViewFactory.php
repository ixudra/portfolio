<?php namespace Ixudra\Portfolio\Services\Html;


use App;

use Ixudra\Core\Services\Html\BaseViewFactory;
use Ixudra\Portfolio\Models\Address;

class AddressViewFactory extends BaseViewFactory {

    public function index($input = array())
    {
        if( empty($input) ) {
            $input = array(
                'city_id'           => ''
            );
        }

        return $this->prepareFilter( 'portfolio::addresses.index', $input );
    }

    public function create($input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Services\Input\AddressInputHelper')->getDefaultInput();
        }

        return $this->prepareForm('portfolio::addresses.create', 'create', $input);
    }

    public function show(Address $address)
    {
        $this->addParameter('address', $address);

        return $this->makeView( 'portfolio::addresses.show' );
    }

    public function edit(Address $address, $input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Services\Input\AddressInputHelper')->getInputForModel( $address );
        }

        $this->addParameter('address', $address);

        return $this->prepareForm('portfolio::addresses.edit', 'update', $input);
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make('\Ixudra\Portfolio\Services\Input\AddressInputHelper')->getInputForSearch( $input );
        $addresses = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository')->search( $searchInput );

        $cities = App::make('\Ixudra\Portfolio\Services\Form\AddressFormHelper')->getCitiesAsSelectList( true );

        $this->addParameter('addresses', $addresses);
        $this->addParameter('cities', $cities);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $formName, $input)
    {
        $countries = App::make('\Ixudra\Portfolio\Services\Form\AddressFormHelper')->getCountriesAsSelectList();

        $requiredFields = App::make('\Ixudra\Portfolio\Services\Validation\AddressValidationHelper')->getRequiredFormFields( $formName );

        $this->addParameter('countries', $countries);
        $this->addParameter('input', $input);
        $this->addParameter('requiredFields', $requiredFields);

        return $this->makeView( $template );
    }

}
