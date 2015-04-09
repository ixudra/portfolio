<?php


use Ixudra\Portfolio\Models\Company;

class CompanyViewFactoryTest extends BaseViewFactoryTestCase {

    protected $companyViewFactory;


    public function setUp()
    {
        parent::setUp();

        $this->companyViewFactory = App::make('\Ixudra\Portfolio\Services\Html\CompanyViewFactory');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Html\CompanyViewFactory::index()
     * @covers \Ixudra\Portfolio\Services\Html\CompanyViewFactory::prepareFilter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testIndex()
    {
        $input = array(
            'query'         => ''
        );

        $this->createFilterMocks( $input );

        $view = $this->companyViewFactory->index();

        $this->assertViewName( $view, 'portfolio::companies.index' );

        $this->assertFilterMocks( $view, $input );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\CompanyViewFactory::create()
     * @covers \Ixudra\Portfolio\Services\Html\CompanyViewFactory::prepareForm()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testCreate_usesInputIfInputIsNotNull()
    {
        $this->createFormMocks();

        $view = $this->companyViewFactory->create('Foo');

        $this->assertViewName( $view, 'portfolio::companies.create' );
        $this->assertViewData( $view, 'input', 'Foo' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\CompanyViewFactory::create()
     * @covers \Ixudra\Portfolio\Services\Html\CompanyViewFactory::prepareForm()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testCreate_usesDefaultValuesIfInputIsNull()
    {
        $companyInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\CompanyInputHelper');
        $companyInputHelperMock->shouldReceive('getDefaultInput')->once()->andReturn('Foo');
        App::instance('\Ixudra\Portfolio\Services\Input\CompanyInputHelper', $companyInputHelperMock);

        $this->createFormMocks();

        $view = $this->companyViewFactory->create( null );

        $this->assertViewName( $view, 'portfolio::companies.create' );
        $this->assertViewData( $view, 'input', 'Foo' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\CompanyViewFactory::show()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testShow()
    {
        $company = new Company( array(  'name' => 'Foo' ) );

        $view = $this->companyViewFactory->show($company);

        $this->assertViewName( $view, 'portfolio::companies.show' );
        $this->assertViewData( $view, 'company', $company );
        $this->assertEquals( 'Foo', $view['company']->name );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\CompanyViewFactory::edit()
     * @covers \Ixudra\Portfolio\Services\Html\CompanyViewFactory::prepareForm()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testEdit_usesInputValuesIfInputIsNotNull()
    {
        $company = new Company( array( 'name' => 'Foo' ) );

        $this->createFormMocks();

        $view = $this->companyViewFactory->edit($company, 'Bar');

        $this->assertViewName( $view, 'portfolio::companies.edit' );
        $this->assertViewData( $view, 'company', $company );
        $this->assertViewData( $view, 'input', 'Bar' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\CompanyViewFactory::edit()
     * @covers \Ixudra\Portfolio\Services\Html\CompanyViewFactory::prepareForm()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testEdit_usesCompanyValuesIfInputIsNull()
    {
        $companyInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\CompanyInputHelper');
        $companyInputHelperMock->shouldReceive('getInputForModel')->once()->andReturn('Bar');
        App::instance('\Ixudra\Portfolio\Services\Input\CompanyInputHelper', $companyInputHelperMock);

        $company = new Company( array('name' => 'Bar') );

        $this->createFormMocks();

        $view = $this->companyViewFactory->edit($company, null);

        $this->assertViewName( $view, 'portfolio::companies.edit' );
        $this->assertViewData( $view, 'company', $company );
        $this->assertViewData( $view, 'input', 'Bar');
        $this->assertFormMocks( $view );
    }

    protected function createFilterMocks($input)
    {
        $searchInput = array( 'Fow' => 'Baw' );

        $companyInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\CompanyInputHelper');
        $companyInputHelperMock->shouldReceive('getInputForSearch')->once()->with($input)->andReturn($searchInput);
        App::instance('\Ixudra\Portfolio\Services\Input\CompanyInputHelper', $companyInputHelperMock);

        $company1 = new Company( array( 'name' => 'Foo' ) );
        $company2 = new Company( array( 'name' => 'Bar' ) );
        $companies = new \Illuminate\Support\Collection( array( $company1, $company2 ) );

        $companyInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository');
        $companyInputHelperMock->shouldReceive('search')->once()->with($searchInput, 25)->andReturn($companies);
        App::instance('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository', $companyInputHelperMock);
    }

    protected function assertFilterMocks($view, $input)
    {
        $this->assertViewData( $view, 'input', $input );
        $this->assertViewDataSize( $view, 'companies', 2 );
        $this->assertEquals( 'Foo', $view['companies'][0]->name );
        $this->assertEquals( 'Bar', $view['companies'][1]->name );
    }

    protected function createFormMocks()
    {
        // ...
    }

    protected function assertFormMocks($view)
    {
        // ...
    }

}