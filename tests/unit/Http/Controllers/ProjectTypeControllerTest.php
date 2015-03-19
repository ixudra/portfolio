<?php


use App\Models\ProjectType;

class ProjectTypeControllerTest extends BaseUnitTestCase {

    const PROJECT_TYPE_ID = 10;


    /**
     * @covers \App\Http\Controllers\ProjectTypeController::index()
     */
    public function testIndex()
    {
        $projectTypeViewFactoryMock = Mockery::mock('App\Services\Html\ProjectTypeViewFactory');
        $projectTypeViewFactoryMock->shouldReceive('index')->once()->andReturn('factoryFoo');
        App::instance('App\Services\Html\ProjectTypeViewFactory', $projectTypeViewFactoryMock);

        $response = $this->call('GET', 'admin/projectTypes');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \App\Http\Controllers\ProjectTypeController::filter()
     */
    public function testFilter_get()
    {
        $input = array(
            'Foo'       => 'Bar',
        );

        $filterProjectTypeRequestFormMock = Mockery::mock('App\Http\Requests\ProjectType\FilterProjectTypeFormRequest');
        $filterProjectTypeRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('App\Http\Requests\ProjectType\FilterProjectTypeFormRequest', $filterProjectTypeRequestFormMock);

        $projectTypeViewFactoryMock = Mockery::mock('App\Services\Html\ProjectTypeViewFactory');
        $projectTypeViewFactoryMock->shouldReceive('index')->once()->with($input)->andReturn('factoryFoo');
        App::instance('App\Services\Html\ProjectTypeViewFactory', $projectTypeViewFactoryMock);

        $response = $this->call('GET', 'admin/projectTypes/filter?foo=bar');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \App\Http\Controllers\ProjectTypeController::filter()
     */
    public function testFilter_post()
    {
        $input = array(
            '_token'    => 'Foo_token',
            'Foo'       => 'Bar',
        );

        $filterProjectTypeRequestFormMock = Mockery::mock('App\Http\Requests\ProjectType\FilterProjectTypeFormRequest');
        $filterProjectTypeRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('App\Http\Requests\ProjectType\FilterProjectTypeFormRequest', $filterProjectTypeRequestFormMock);

        $projectTypeViewFactoryMock = Mockery::mock('App\Services\Html\ProjectTypeViewFactory');
        $projectTypeViewFactoryMock->shouldReceive('index')->once()->with($input)->andReturn('factoryFoo');
        App::instance('App\Services\Html\ProjectTypeViewFactory', $projectTypeViewFactoryMock);

        $response = $this->call('POST', 'admin/projectTypes/filter', $input);

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \App\Http\Controllers\ProjectTypeController::create()
     */
    public function testCreate()
    {
        $projectTypeViewFactoryMock = Mockery::mock('App\Services\Html\ProjectTypeViewFactory');
        $projectTypeViewFactoryMock->shouldReceive('create')->once()->andReturn('factoryFoo');
        App::instance('App\Services\Html\ProjectTypeViewFactory', $projectTypeViewFactoryMock);

        $response = $this->call('GET', 'admin/projectTypes/create');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \App\Http\Controllers\ProjectTypeController::store()
     */
    public function testStore()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'Foo'           => 'Bar',
        );

        $projectType = new ProjectType();
        $projectType->id = self::PROJECT_TYPE_ID;

        $createProjectTypeRequestFormMock = Mockery::mock('App\Http\Requests\ProjectType\CreateProjectTypeFormRequest');
        $createProjectTypeRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('App\Http\Requests\ProjectType\CreateProjectTypeFormRequest', $createProjectTypeRequestFormMock);

        $userFactoryMock = Mockery::mock('App\Services\Factories\ProjectTypeFactory');
        $userFactoryMock->shouldReceive('make')->once()->with($input)->andReturn($projectType);
        App::instance('App\Services\Factories\ProjectTypeFactory', $userFactoryMock);

        Translate::shouldReceive('model')->with('projectType.create.success')->andReturn('Foo_message');

        $response = $this->call('POST', 'admin/projectTypes', $input);

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.projectTypes.show',
            array(self::PROJECT_TYPE_ID),
            array(
                'messageType'       => 'success',
                'messages'          => array('Foo_message')
            )
        );
    }

    /**
     * @covers \App\Http\Controllers\ProjectTypeController::show()
     */
    public function testShow()
    {
        $projectType = new ProjectType();

        $projectTypeRepositoryMock = Mockery::mock('App\Repositories\Eloquent\EloquentProjectTypeRepository');
        $projectTypeRepositoryMock->shouldReceive('find')->with(self::PROJECT_TYPE_ID)->once()->andReturn($projectType);
        App::instance('App\Repositories\Eloquent\EloquentProjectTypeRepository', $projectTypeRepositoryMock);

        $projectTypeViewFactoryMock = Mockery::mock('App\Services\Html\ProjectTypeViewFactory');
        $projectTypeViewFactoryMock->shouldReceive('show')->with($projectType)->once()->andReturn('factoryFoo');
        App::instance('App\Services\Html\ProjectTypeViewFactory', $projectTypeViewFactoryMock);

        $response = $this->call('GET', 'admin/projectTypes/'. self::PROJECT_TYPE_ID);

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \App\Http\Controllers\ProjectTypeController::show()
     */
    public function testShow_returnsProjectTypeNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/projectTypes/'. self::PROJECT_TYPE_ID);

        $this->assertModelNotFound($response);
    }

    /**
     * @covers \App\Http\Controllers\ProjectTypeController::edit()
     */
    public function testEdit()
    {
        $projectType = new ProjectType();

        $projectTypeRepositoryMock = Mockery::mock('App\Repositories\Eloquent\EloquentProjectTypeRepository');
        $projectTypeRepositoryMock->shouldReceive('find')->with(self::PROJECT_TYPE_ID)->once()->andReturn($projectType);
        App::instance('App\Repositories\Eloquent\EloquentProjectTypeRepository', $projectTypeRepositoryMock);

        $projectTypeViewFactoryMock = Mockery::mock('App\Services\Html\ProjectTypeViewFactory');
        $projectTypeViewFactoryMock->shouldReceive('edit')->with($projectType)->once()->andReturn('factoryFoo');
        App::instance('App\Services\Html\ProjectTypeViewFactory', $projectTypeViewFactoryMock);

        $response = $this->call('GET', 'admin/projectTypes/'. self::PROJECT_TYPE_ID .'/edit');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \App\Http\Controllers\ProjectTypeController::edit()
     */
    public function testEdit_returnsProjectTypeNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/projectTypes/'. self::PROJECT_TYPE_ID .'/edit');

        $this->assertModelNotFound($response);
    }

    /**
     * @covers \App\Http\Controllers\ProjectTypeController::update()
     */
    public function testUpdate()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'Foo'           => 'Bar',
        );

        $projectType = new ProjectType();
        $projectType->id = self::PROJECT_TYPE_ID;

        $projectTypeRepositoryMock = Mockery::mock('App\Repositories\Eloquent\EloquentProjectTypeRepository');
        $projectTypeRepositoryMock->shouldReceive('find')->with(self::PROJECT_TYPE_ID)->once()->andReturn($projectType);
        App::instance('App\Repositories\Eloquent\EloquentProjectTypeRepository', $projectTypeRepositoryMock);

        $updateProjectTypeRequestFormMock = Mockery::mock('App\Http\Requests\ProjectType\UpdateProjectTypeFormRequest');
        $updateProjectTypeRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('App\Http\Requests\ProjectType\UpdateProjectTypeFormRequest', $updateProjectTypeRequestFormMock);

        $userFactoryMock = Mockery::mock('App\Services\Factories\ProjectTypeFactory');
        $userFactoryMock->shouldReceive('modify')->once()->with($projectType, $input);
        App::instance('App\Services\Factories\ProjectTypeFactory', $userFactoryMock);

        Translate::shouldReceive('model')->with('projectType.edit.success')->andReturn('Foo_message');

        $response = $this->call('PUT', 'admin/projectTypes/'. self::PROJECT_TYPE_ID, $input);

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.projectTypes.show',
            array(self::PROJECT_TYPE_ID),
            array(
                'messageType'       => 'success',
                'messages'          => array('Foo_message')
            )
        );
    }

    /**
     * @covers \App\Http\Controllers\ProjectTypeController::update()
     */
    public function testUpdate_returnsProjectTypeNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/projectTypes/'. self::PROJECT_TYPE_ID);

        $this->assertModelNotFound($response);
    }

    /**
     * @covers \App\Http\Controllers\ProjectTypeController::destroy()
     */
    public function testDestroy()
    {
        $projectTypeMock = Mockery::mock('App\Models\ProjectType');
        $projectTypeMock->shouldReceive('delete')->once();

        $projectTypeRepositoryMock = Mockery::mock('App\Repositories\Eloquent\EloquentProjectTypeRepository');
        $projectTypeRepositoryMock->shouldReceive('find')->with(self::PROJECT_TYPE_ID)->once()->andReturn($projectTypeMock);
        App::instance('App\Repositories\Eloquent\EloquentProjectTypeRepository', $projectTypeRepositoryMock);

        Translate::shouldReceive('model')->with('projectType.delete.success')->andReturn('Foo_message');

        $response = $this->call('DELETE', 'admin/projectTypes/'. self::PROJECT_TYPE_ID .'?_token=Foo_token');

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.projectTypes.index',
            array(),
            array(
                'messageType' => 'success',
                'messages'    => array( 'Foo_message' )
            )
        );
    }

    /**
     * @covers \App\Http\Controllers\ProjectTypeController::destroy()
     */
    public function testDestroy_returnsToIndexIfProjectTypeIsNotFound()
    {
        $this->setupModelNotFound();

        $response = $this->call('DELETE', 'admin/projectTypes/'. self::PROJECT_TYPE_ID .'?_token=Foo_token');

        $this->assertModelNotFound($response);
    }

    protected function setupModelNotFound()
    {
        $projectTypeRepositoryMock = Mockery::mock('App\Repositories\Eloquent\EloquentProjectTypeRepository');
        $projectTypeRepositoryMock->shouldReceive('find')->with(self::PROJECT_TYPE_ID)->once()->andReturn(null);
        App::instance('App\Repositories\Eloquent\EloquentProjectTypeRepository', $projectTypeRepositoryMock);

        Translate::shouldReceive('model')->with('projectType.error.notFound')->andReturn('Foo_message');
    }

    protected function assertModelNotFound($response)
    {
        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.projectTypes.index',
            array(),
            array(
                'messageType' => 'error',
                'messages'    => array( 'Foo_message' )
            )
        );
    }

}