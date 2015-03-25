<?php


use Ixudra\Portfolio\Models\Project;

class ProjectControllerTest extends BaseUnitTestCase {

    const PROJECT_ID = 10;


    /**
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::index()
     */
    public function testIndex()
    {
        $projectViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\ProjectViewFactory');
        $projectViewFactoryMock->shouldReceive('index')->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\ProjectViewFactory', $projectViewFactoryMock);

        $response = $this->call('GET', 'admin/projects');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::filter()
     */
    public function testFilter_get()
    {
        $input = array(
            'Foo'       => 'Bar',
        );

        $filterProjectRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Project\FilterProjectFormRequest');
        $filterProjectRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Project\FilterProjectFormRequest', $filterProjectRequestFormMock);

        $projectViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\ProjectViewFactory');
        $projectViewFactoryMock->shouldReceive('index')->once()->with($input)->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\ProjectViewFactory', $projectViewFactoryMock);

        $response = $this->call('GET', 'admin/projects/filter?foo=bar');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::filter()
     */
    public function testFilter_post()
    {
        $input = array(
            '_token'    => 'Foo_token',
            'Foo'       => 'Bar',
        );

        $filterProjectRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Project\FilterProjectFormRequest');
        $filterProjectRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Project\FilterProjectFormRequest', $filterProjectRequestFormMock);

        $projectViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\ProjectViewFactory');
        $projectViewFactoryMock->shouldReceive('index')->once()->with($input)->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\ProjectViewFactory', $projectViewFactoryMock);

        $response = $this->call('POST', 'admin/projects/filter', $input);

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::create()
     */
    public function testCreate()
    {
        $projectViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\ProjectViewFactory');
        $projectViewFactoryMock->shouldReceive('create')->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\ProjectViewFactory', $projectViewFactoryMock);

        $response = $this->call('GET', 'admin/projects/create');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::store()
     */
    public function testStore()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'Foo'           => 'Bar',
        );

        $project = new Project();
        $project->id = self::PROJECT_ID;

        $createProjectRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Project\CreateProjectFormRequest');
        $createProjectRequestFormMock->shouldReceive('getInput')->once()->with(true)->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Project\CreateProjectFormRequest', $createProjectRequestFormMock);

        $userFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Factories\ProjectFactory');
        $userFactoryMock->shouldReceive('make')->once()->with($input)->andReturn($project);
        App::instance('Ixudra\Portfolio\Services\Factories\ProjectFactory', $userFactoryMock);

        Translate::shouldReceive('model')->with('project.create.success')->andReturn('Foo_message');

        $response = $this->call('POST', 'admin/projects', $input);

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.projects.show',
            array(self::PROJECT_ID),
            array(
                'messageType'       => 'success',
                'messages'          => array('Foo_message')
            )
        );
    }

    /**
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::show()
     */
    public function testShow()
    {
        $project = new Project();

        $projectRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository');
        $projectRepositoryMock->shouldReceive('find')->with(self::PROJECT_ID)->once()->andReturn($project);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository', $projectRepositoryMock);

        $projectViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\ProjectViewFactory');
        $projectViewFactoryMock->shouldReceive('show')->with($project)->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\ProjectViewFactory', $projectViewFactoryMock);

        $response = $this->call('GET', 'admin/projects/'. self::PROJECT_ID);

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::show()
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::modelNotFound()
     * @covers Ixudra\Core\Http\Controllers\BaseController::redirect()
     */
    public function testShow_returnsProjectNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/projects/'. self::PROJECT_ID);

        $this->assertModelNotFound($response);
    }

    /**
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::edit()
     */
    public function testEdit()
    {
        $project = new Project();

        $projectRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository');
        $projectRepositoryMock->shouldReceive('find')->with(self::PROJECT_ID)->once()->andReturn($project);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository', $projectRepositoryMock);

        $projectViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\ProjectViewFactory');
        $projectViewFactoryMock->shouldReceive('edit')->with($project)->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\ProjectViewFactory', $projectViewFactoryMock);

        $response = $this->call('GET', 'admin/projects/'. self::PROJECT_ID .'/edit');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::edit()
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::modelNotFound()
     * @covers Ixudra\Core\Http\Controllers\BaseController::redirect()
     */
    public function testEdit_returnsProjectNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/projects/'. self::PROJECT_ID .'/edit');

        $this->assertModelNotFound($response);
    }

    /**
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::update()
     */
    public function testUpdate()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'Foo'           => 'Bar',
        );

        $project = new Project();
        $project->id = self::PROJECT_ID;

        $projectRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository');
        $projectRepositoryMock->shouldReceive('find')->with(self::PROJECT_ID)->once()->andReturn($project);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository', $projectRepositoryMock);

        $updateProjectRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Project\UpdateProjectFormRequest');
        $updateProjectRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Project\UpdateProjectFormRequest', $updateProjectRequestFormMock);

        $userFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Factories\ProjectFactory');
        $userFactoryMock->shouldReceive('modify')->once()->with($project, $input);
        App::instance('Ixudra\Portfolio\Services\Factories\ProjectFactory', $userFactoryMock);

        Translate::shouldReceive('model')->with('project.edit.success')->andReturn('Foo_message');

        $response = $this->call('PUT', 'admin/projects/'. self::PROJECT_ID, $input);

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.projects.show',
            array(self::PROJECT_ID),
            array(
                'messageType'       => 'success',
                'messages'          => array('Foo_message')
            )
        );
    }

    /**
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::update()
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::modelNotFound()
     * @covers Ixudra\Core\Http\Controllers\BaseController::redirect()
     */
    public function testUpdate_returnsProjectNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/projects/'. self::PROJECT_ID);

        $this->assertModelNotFound($response);
    }

    /**
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::destroy()
     */
    public function testDestroy()
    {
        $projectMock = Mockery::mock('Project');
        $projectMock->shouldReceive('delete')->once();

        $projectRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository');
        $projectRepositoryMock->shouldReceive('find')->with(self::PROJECT_ID)->once()->andReturn($projectMock);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository', $projectRepositoryMock);

        Translate::shouldReceive('model')->with('project.delete.success')->andReturn('Foo_message');

        $response = $this->call('DELETE', 'admin/projects/'. self::PROJECT_ID .'?_token=Foo_token');

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.projects.index',
            array(),
            array(
                'messageType' => 'success',
                'messages'    => array( 'Foo_message' )
            )
        );
    }

    /**
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::destroy()
     * @covers Ixudra\Portfolio\Http\Controllers\ProjectController::modelNotFound()
     * @covers Ixudra\Core\Http\Controllers\BaseController::redirect()
     */
    public function testDestroy_returnsToIndexIfProjectIsNotFound()
    {
        $this->setupModelNotFound();

        $response = $this->call('DELETE', 'admin/projects/'. self::PROJECT_ID .'?_token=Foo_token');

        $this->assertModelNotFound($response);
    }

    protected function setupModelNotFound()
    {
        $projectRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository');
        $projectRepositoryMock->shouldReceive('find')->with(self::PROJECT_ID)->once()->andReturn(null);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository', $projectRepositoryMock);

        Translate::shouldReceive('model')->with('project.error.notFound')->andReturn('Foo_message');
    }

    protected function assertModelNotFound($response)
    {
        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.projects.index',
            array(),
            array(
                'messageType' => 'error',
                'messages'    => array( 'Foo_message' )
            )
        );
    }

}