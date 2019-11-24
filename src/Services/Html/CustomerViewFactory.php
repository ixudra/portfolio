<?php namespace Ixudra\Portfolio\Services\Html;


use Ixudra\Core\Services\Html\BaseViewFactory;
use Ixudra\Portfolio\Interfaces\Models\CustomerInterface;
use Ixudra\Portfolio\Interfaces\Repositories\CustomerRepositoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Form\AddressFormHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Form\CustomerFormHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Html\CustomerViewFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Input\CustomerInputHelperInterface;
use Ixudra\Portfolio\Interfaces\Services\Validation\CustomerValidationHelperInterface;

use App;

class CustomerViewFactory extends BaseViewFactory implements CustomerViewFactoryInterface {

    public function index($input = array())
    {
        if( empty($input) ) {
            $input = array(
                'query'                 => '',
                'withProjects'          => '',
            );
        }

        return $this->prepareFilter( 'portfolio::customers.index', $input );
    }

    public function create($input = null)
    {
        if( $input === null ) {
            $input = App::make( CustomerInputHelperInterface::class )->getDefaultInput();
        }

        return $this->prepareForm('portfolio::customers.create', 'create', $input);
    }

    public function show(CustomerInterface $customer)
    {
        $this->addParameter('customer', $customer);
        $this->addParameter('contentTemplate', 'portfolio::'. $customer->object->getPlural() .'.show.content');
        $this->addParameter('contentParameters', array($customer->object->getSingular() => $customer->object));

        return $this->makeView( 'portfolio::customers.show' );
    }

    public function edit(CustomerInterface $customer, $input = null)
    {
        $customerType = $customer->object->getSingular();
        if( $input === null ) {
            $input = App::make( CustomerInputHelperInterface::class )->getInputForModel( $customer, $customerType );
        }

        $form = array(
            'template'              => 'portfolio::'. $customer->object->getPlural() .'.form.full',
            'customerType'          => $customerType,
        );

        $this->addParameter('customer', $customer);
        $this->addParameter('form', $form);

        return $this->prepareForm('portfolio::customers.edit', 'update', $input, $customer);
    }

    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make( CustomerInputHelperInterface::class )->getInputForSearch( $input );
        $customers = App::make( CustomerRepositoryInterface::class )->search( $searchInput );
        $withProjectOptions = App::make( CustomerFormHelperInterface::class )->getWithProjectOptionsAsSelectList( true );

        $this->addParameter('customers', $customers);
        $this->addParameter('withProjectOptions', $withProjectOptions);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $formName, $input, $customer = null)
    {
        $countries = App::make( AddressFormHelperInterface::class )->getCountriesAsSelectList();

        $customerType = 'company';
        if( $customer !== null ) {
            $customerType = $customer->object->getSingular();
            $this->addParameter('prefix', $customerType .'_');
        }
        $requiredFields = App::makeWith( CustomerValidationHelperInterface::class, array('customerType' => $customerType))->getRequiredFormFields( $formName );

        $this->addParameter('countries', $countries);
        $this->addParameter('input', $input);
        $this->addParameter('requiredFields', $requiredFields);

        return $this->makeView( $template );
    }

}
