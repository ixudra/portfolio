<?php namespace Ixudra\Portfolio\Services\Html;


use App;

use Ixudra\Core\Services\Html\BaseViewFactory;

use Ixudra\Portfolio\Models\Customer;

class CustomerViewFactory extends BaseViewFactory {

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
            $input = App::make('\Ixudra\Portfolio\Services\Input\CustomerInputHelper')->getDefaultInput();
        }

        return $this->prepareForm( 'portfolio::customers.create', $input );
    }

    public function show($customer)
    {
        $this->addParameter('customer', $customer);
        $this->addParameter('contentTemplate', 'portfolio::'. $customer->object->getPlural() .'.show.content');
        $this->addParameter('contentParameters', array($customer->object->getSingular() => $customer->object));

        return $this->makeView( 'portfolio::customers.show' );
    }

    public function edit($customer, $input = null)
    {
        if( $input == null ) {
            $input = App::make('\Ixudra\Portfolio\Services\Input\CustomerInputHelper')->getInputForModel( $customer );
        }

        $form = array(
            'template'              => 'portfolio::'. $customer->object->getPlural() .'.form.full',
            'customerType'          => $customer->object->getSingular(),
        );

        $this->addParameter('customer', $customer);
        $this->addParameter('form', $form);

        return $this->prepareForm( 'portfolio::customers.edit', $input );
    }

    protected function prepareFilter($template, $input)
    {
        $searchInput = App::make('\Ixudra\Portfolio\Services\Input\CustomerInputHelper')->getInputForSearch( $input );
        $customers = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository')->search( $searchInput, 25 );
        $withProjectOptions = App::make('\Ixudra\Portfolio\Services\Form\CustomerFormHelper')->getWithProjectOptionsAsSelectList( true );

        $this->addParameter('customers', $customers);
        $this->addParameter('withProjectOptions', $withProjectOptions);
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

    protected function prepareForm($template, $input)
    {
        $this->addParameter('input', $input);

        return $this->makeView( $template );
    }

}
