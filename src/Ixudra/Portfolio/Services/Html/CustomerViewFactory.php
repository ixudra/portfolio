<?php namespace Ixudra\Portfolio\Services\Html;


use Ixudra\Core\Services\Html\BaseViewFactory;
use Ixudra\Portfolio\Interfaces\Services\Html\CustomerViewFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\CustomerInterface;

use App;

class CustomerViewFactory extends BaseViewFactory implements CustomerViewFactoryInterface {

    public function index($input = array())
    {
        if( empty($input) ) {
            $input = array(
                'query'                 => '',
                'withProjects'          => 1,
            );
        }

        return $this->prepareFilter( 'portfolio::customers.index', $input );
    }

    public function create($input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Interfaces\Services\Input\CustomerInputHelperInterface')->getDefaultInput();
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
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Interfaces\Services\Input\CustomerInputHelperInterface')->getInputForModel( $customer, $customerType );
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
        $searchInput = App::make('\Ixudra\Portfolio\Interfaces\Services\Input\CustomerInputHelperInterface')->getInputForSearch( $input );
        $customers = App::make('\Ixudra\Portfolio\Interfaces\Repositories\CustomerRepositoryInterface')->search( $searchInput );
        $withProjectOptions = App::make('\Ixudra\Portfolio\Interfaces\Services\Form\CustomerFormHelperInterface')->getWithProjectOptionsAsSelectList( true );

        $this->addParameter('customers', $customers);
        $this->addParameter('withProjectOptions', $withProjectOptions);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $formName, $input, $customer = null)
    {
        $countries = App::make('\Ixudra\Portfolio\Interfaces\Services\Form\AddressFormHelperInterface')->getCountriesAsSelectList();

        $customerType = 'company';
        if( !is_null($customer) ) {
            $customerType = $customer->object->getSingular();
            $this->addParameter('prefix', $customerType .'_');
        }
        $requiredFields = App::make('\Ixudra\Portfolio\Interfaces\Services\Validation\CustomerValidationHelperInterface', array($customerType))->getRequiredFormFields( $formName );

        $this->addParameter('countries', $countries);
        $this->addParameter('input', $input);
        $this->addParameter('requiredFields', $requiredFields);

        return $this->makeView( $template );
    }

}
