<?php


use Ixudra\Portfolio\Models\Company;

class CompanyControllerTest extends BaseUnitTestCase {

    const COMPANY_ID = 10;


    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CompanyController::index()
     */
    public function testIndex()
    {
        $companyViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\CompanyViewFactory');
        $companyViewFactoryMock->shouldReceive('index')->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\CompanyViewFactory', $companyViewFactoryMock);

        $response = $this->call('GET', 'admin/companies');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CompanyController::filter()
     */
    public function testFilter_get()
    {
        $input = array(
            'Foo'       => 'Bar',
        );

        $filterCompanyRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Companies\FilterCompanyFormRequest');
        $filterCompanyRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Companies\FilterCompanyFormRequest', $filterCompanyRequestFormMock);

        $companyViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\CompanyViewFactory');
        $companyViewFactoryMock->shouldReceive('index')->once()->with($input)->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\CompanyViewFactory', $companyViewFactoryMock);

        $response = $this->call('GET', 'admin/companies/filter?foo=bar');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CompanyController::filter()
     */
    public function testFilter_post()
    {
        $input = array(
            '_token'    => 'Foo_token',
            'Foo'       => 'Bar',
        );

        $filterCompanyRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Companies\FilterCompanyFormRequest');
        $filterCompanyRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Companies\FilterCompanyFormRequest', $filterCompanyRequestFormMock);

        $companyViewFactoryMock = Mockery::mock('App\Services\Html\CompanyViewFactory');
        $companyViewFactoryMock->shouldReceive('index')->once()->with($input)->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\CompanyViewFactory', $companyViewFactoryMock);

        $response = $this->call('POST', 'admin/companies/filter', $input);

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CompanyController::create()
     */
    public function testCreate()
    {
        $companyViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\CompanyViewFactory');
        $companyViewFactoryMock->shouldReceive('create')->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\CompanyViewFactory', $companyViewFactoryMock);

        $response = $this->call('GET', 'admin/companies/create');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CompanyController::store()
     */
    public function testStore()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'Foo'           => 'Bar',
        );

        $company = new Company();
        $company->id = self::COMPANY_ID;

        $createCompanyRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Companies\CreateCompanyFormRequest');
        $createCompanyRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Companies\CreateCompanyFormRequest', $createCompanyRequestFormMock);

        $userFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Factories\CompanyFactory');
        $userFactoryMock->shouldReceive('make')->once()->with($input)->andReturn($company);
        App::instance('Ixudra\Portfolio\Services\Factories\CompanyFactory', $userFactoryMock);

        Translate::shouldReceive('model')->with('company.create.success')->andReturn('Foo_message');

        $response = $this->call('POST', 'admin/companies', $input);

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.companies.show',
            array(self::COMPANY_ID),
            array(
                'messageType'       => 'success',
                'messages'          => array('Foo_message')
            )
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CompanyController::show()
     */
    public function testShow()
    {
        $company = new Company();

        $companyRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository');
        $companyRepositoryMock->shouldReceive('find')->with(self::COMPANY_ID)->once()->andReturn($company);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository', $companyRepositoryMock);

        $companyViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\CompanyViewFactory');
        $companyViewFactoryMock->shouldReceive('show')->with($company)->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\CompanyViewFactory', $companyViewFactoryMock);

        $response = $this->call('GET', 'admin/companies/'. self::COMPANY_ID);

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CompanyController::show()
     */
    public function testShow_returnsCompanyNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/companies/'. self::COMPANY_ID);

        $this->assertModelNotFound($response);
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CompanyController::edit()
     */
    public function testEdit()
    {
        $company = new Company();

        $companyRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository');
        $companyRepositoryMock->shouldReceive('find')->with(self::COMPANY_ID)->once()->andReturn($company);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository', $companyRepositoryMock);

        $companyViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\CompanyViewFactory');
        $companyViewFactoryMock->shouldReceive('edit')->with($company)->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\CompanyViewFactory', $companyViewFactoryMock);

        $response = $this->call('GET', 'admin/companies/'. self::COMPANY_ID .'/edit');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CompanyController::edit()
     */
    public function testEdit_returnsCompanyNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/companies/'. self::COMPANY_ID .'/edit');

        $this->assertModelNotFound($response);
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CompanyController::update()
     */
    public function testUpdate()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'Foo'           => 'Bar',
        );

        $company = new Company();
        $company->id = self::COMPANY_ID;

        $companyRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository');
        $companyRepositoryMock->shouldReceive('find')->with(self::COMPANY_ID)->once()->andReturn($company);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository', $companyRepositoryMock);

        $updateCompanyRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Companies\UpdateCompanyFormRequest');
        $updateCompanyRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Companies\UpdateCompanyFormRequest', $updateCompanyRequestFormMock);

        $userFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Factories\CompanyFactory');
        $userFactoryMock->shouldReceive('modify')->once()->with($company, $input);
        App::instance('Ixudra\Portfolio\Services\Factories\CompanyFactory', $userFactoryMock);

        Translate::shouldReceive('model')->with('company.edit.success')->andReturn('Foo_message');

        $response = $this->call('PUT', 'admin/companies/'. self::COMPANY_ID, $input);

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.companies.show',
            array(self::COMPANY_ID),
            array(
                'messageType'       => 'success',
                'messages'          => array('Foo_message')
            )
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CompanyController::update()
     */
    public function testUpdate_returnsCompanyNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/companies/'. self::COMPANY_ID);

        $this->assertModelNotFound($response);
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CompanyController::destroy()
     */
    public function testDestroy()
    {
        $companyMock = Mockery::mock('Ixudra\Portfolio\Models\Company');
        $companyMock->shouldReceive('delete')->once();

        $companyRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository');
        $companyRepositoryMock->shouldReceive('find')->with(self::COMPANY_ID)->once()->andReturn($companyMock);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository', $companyRepositoryMock);

        Translate::shouldReceive('model')->with('company.delete.success')->andReturn('Foo_message');

        $response = $this->call('DELETE', 'admin/companies/'. self::COMPANY_ID .'?_token=Foo_token');

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.companies.index',
            array(),
            array(
                'messageType' => 'success',
                'messages'    => array( 'Foo_message' )
            )
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CompanyController::destroy()
     */
    public function testDestroy_returnsToIndexIfCompanyIsNotFound()
    {
        $this->setupModelNotFound();

        $response = $this->call('DELETE', 'admin/companies/'. self::COMPANY_ID .'?_token=Foo_token');

        $this->assertModelNotFound($response);
    }

    protected function setupModelNotFound()
    {
        $companyRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository');
        $companyRepositoryMock->shouldReceive('find')->with(self::COMPANY_ID)->once()->andReturn(null);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository', $companyRepositoryMock);

        Translate::shouldReceive('model')->with('company.error.notFound')->andReturn('Foo_message');
    }

    protected function assertModelNotFound($response)
    {
        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.companies.index',
            array(),
            array(
                'messageType' => 'error',
                'messages'    => array( 'Foo_message' )
            )
        );
    }

}