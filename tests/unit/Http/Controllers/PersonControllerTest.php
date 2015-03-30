<?php


use Ixudra\Portfolio\Models\Person;

class PersonControllerTest extends BaseUnitTestCase {

    const PERSON_ID = 10;


    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\PersonController::index()
     */
    public function testIndex()
    {
        $personViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\PersonViewFactory');
        $personViewFactoryMock->shouldReceive('index')->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\PersonViewFactory', $personViewFactoryMock);

        $response = $this->call('GET', 'admin/people');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\PersonController::filter()
     */
    public function testFilter_get()
    {
        $input = array(
            'Foo'       => 'Bar',
        );

        $filterPersonRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\People\FilterPersonFormRequest');
        $filterPersonRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\People\FilterPersonFormRequest', $filterPersonRequestFormMock);

        $personViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\PersonViewFactory');
        $personViewFactoryMock->shouldReceive('index')->once()->with($input)->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\PersonViewFactory', $personViewFactoryMock);

        $response = $this->call('GET', 'admin/people/filter?foo=bar');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\PersonController::filter()
     */
    public function testFilter_post()
    {
        $input = array(
            '_token'    => 'Foo_token',
            'Foo'       => 'Bar',
        );

        $filterPersonRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\People\FilterPersonFormRequest');
        $filterPersonRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\People\FilterPersonFormRequest', $filterPersonRequestFormMock);

        $personViewFactoryMock = Mockery::mock('App\Services\Html\PersonViewFactory');
        $personViewFactoryMock->shouldReceive('index')->once()->with($input)->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\PersonViewFactory', $personViewFactoryMock);

        $response = $this->call('POST', 'admin/people/filter', $input);

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\PersonController::create()
     */
    public function testCreate()
    {
        $personViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\PersonViewFactory');
        $personViewFactoryMock->shouldReceive('create')->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\PersonViewFactory', $personViewFactoryMock);

        $response = $this->call('GET', 'admin/people/create');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\PersonController::store()
     */
    public function testStore()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'Foo'           => 'Bar',
        );

        $person = new Person();
        $person->id = self::PERSON_ID;

        $createPersonRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\People\CreatePersonFormRequest');
        $createPersonRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\People\CreatePersonFormRequest', $createPersonRequestFormMock);

        $userFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Factories\PersonFactory');
        $userFactoryMock->shouldReceive('make')->once()->with($input)->andReturn($person);
        App::instance('Ixudra\Portfolio\Services\Factories\PersonFactory', $userFactoryMock);

        Translate::shouldReceive('model')->with('person.create.success')->andReturn('Foo_message');

        $response = $this->call('POST', 'admin/people', $input);

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.people.show',
            array(self::PERSON_ID),
            array(
                'messageType'       => 'success',
                'messages'          => array('Foo_message')
            )
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\PersonController::show()
     */
    public function testShow()
    {
        $person = new Person();

        $personRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository');
        $personRepositoryMock->shouldReceive('find')->with(self::PERSON_ID)->once()->andReturn($person);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository', $personRepositoryMock);

        $personViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\PersonViewFactory');
        $personViewFactoryMock->shouldReceive('show')->with($person)->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\PersonViewFactory', $personViewFactoryMock);

        $response = $this->call('GET', 'admin/people/'. self::PERSON_ID);

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\PersonController::show()
     */
    public function testShow_returnsPersonNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/people/'. self::PERSON_ID);

        $this->assertModelNotFound($response);
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\PersonController::edit()
     */
    public function testEdit()
    {
        $person = new Person();

        $personRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository');
        $personRepositoryMock->shouldReceive('find')->with(self::PERSON_ID)->once()->andReturn($person);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository', $personRepositoryMock);

        $personViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\PersonViewFactory');
        $personViewFactoryMock->shouldReceive('edit')->with($person)->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\PersonViewFactory', $personViewFactoryMock);

        $response = $this->call('GET', 'admin/people/'. self::PERSON_ID .'/edit');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\PersonController::edit()
     */
    public function testEdit_returnsPersonNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/people/'. self::PERSON_ID .'/edit');

        $this->assertModelNotFound($response);
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\PersonController::update()
     */
    public function testUpdate()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'Foo'           => 'Bar',
        );

        $person = new Person();
        $person->id = self::PERSON_ID;

        $personRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository');
        $personRepositoryMock->shouldReceive('find')->with(self::PERSON_ID)->once()->andReturn($person);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository', $personRepositoryMock);

        $updatePersonRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\People\UpdatePersonFormRequest');
        $updatePersonRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\People\UpdatePersonFormRequest', $updatePersonRequestFormMock);

        $userFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Factories\PersonFactory');
        $userFactoryMock->shouldReceive('modify')->once()->with($person, $input);
        App::instance('Ixudra\Portfolio\Services\Factories\PersonFactory', $userFactoryMock);

        Translate::shouldReceive('model')->with('person.edit.success')->andReturn('Foo_message');

        $response = $this->call('PUT', 'admin/people/'. self::PERSON_ID, $input);

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.people.show',
            array(self::PERSON_ID),
            array(
                'messageType'       => 'success',
                'messages'          => array('Foo_message')
            )
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\PersonController::update()
     */
    public function testUpdate_returnsPersonNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/people/'. self::PERSON_ID);

        $this->assertModelNotFound($response);
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\PersonController::destroy()
     */
    public function testDestroy()
    {
        $personMock = Mockery::mock('Ixudra\Portfolio\Models\Person');
        $personMock->shouldReceive('delete')->once();

        $personRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository');
        $personRepositoryMock->shouldReceive('find')->with(self::PERSON_ID)->once()->andReturn($personMock);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository', $personRepositoryMock);

        Translate::shouldReceive('model')->with('person.delete.success')->andReturn('Foo_message');

        $response = $this->call('DELETE', 'admin/people/'. self::PERSON_ID .'?_token=Foo_token');

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.people.index',
            array(),
            array(
                'messageType' => 'success',
                'messages'    => array( 'Foo_message' )
            )
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\PersonController::destroy()
     */
    public function testDestroy_returnsToIndexIfPersonIsNotFound()
    {
        $this->setupModelNotFound();

        $response = $this->call('DELETE', 'admin/people/'. self::PERSON_ID .'?_token=Foo_token');

        $this->assertModelNotFound($response);
    }

    protected function setupModelNotFound()
    {
        $personRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository');
        $personRepositoryMock->shouldReceive('find')->with(self::PERSON_ID)->once()->andReturn(null);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository', $personRepositoryMock);

        Translate::shouldReceive('model')->with('person.error.notFound')->andReturn('Foo_message');
    }

    protected function assertModelNotFound($response)
    {
        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.people.index',
            array(),
            array(
                'messageType' => 'error',
                'messages'    => array( 'Foo_message' )
            )
        );
    }

}