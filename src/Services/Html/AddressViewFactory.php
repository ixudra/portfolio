<?php namespace Ixudra\Portfolio\Services\Html;


use Ixudra\Core\Services\Html\BaseViewFactory;
use Ixudra\Portfolio\Interfaces\Repositories\AddressRepositoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Form\AddressFormHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Input\AddressInputHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Html\AddressViewFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Validation\AddressValidationHelperInterface;
use Ixudra\Portfolio\Interfaces\Models\AddressInterface;

use App;

class AddressViewFactory extends BaseViewFactory implements AddressViewFactoryInterface {

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
            $input = App::make( AddressInputHelperInterface::class )->getDefaultInput();
        }

        return $this->prepareForm('portfolio::addresses.create', 'create', $input);
    }

    public function show(AddressInterface $address)
    {
        $this->addParameter('address', $address);

        return $this->makeView( 'portfolio::addresses.show' );
    }

    public function edit(AddressInterface $address, $input = null)
    {
        if( $input == null ) {
            $input = App::make( AddressInputHelperInterface::class )->getInputForModel( $address );
        }

        $this->addParameter('address', $address);

        return $this->prepareForm('portfolio::addresses.edit', 'update', $input);
    }


    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make( AddressInputHelperInterface::class )->getInputForSearch( $input );
        $addresses = App::make( AddressRepositoryInterface::class )->search( $searchInput );

        $cities = App::make( AddressFormHelperInterface::class )->getCitiesAsSelectList( true );

        $this->addParameter('addresses', $addresses);
        $this->addParameter('cities', $cities);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $formName, $input)
    {
        $countries = App::make( AddressFormHelperInterface::class )->getCountriesAsSelectList();

        $requiredFields = App::make( AddressValidationHelperInterface::class )->getRequiredFormFields( $formName );

        $this->addParameter('countries', $countries);
        $this->addParameter('input', $input);
        $this->addParameter('requiredFields', $requiredFields);

        return $this->makeView( $template );
    }

}
