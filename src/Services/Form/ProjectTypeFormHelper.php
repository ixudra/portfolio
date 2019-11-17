<?php namespace Ixudra\Portfolio\Services\Form;


use Ixudra\Core\Services\Form\BaseFormHelper;
use Ixudra\Portfolio\Interfaces\Repositories\ProjectTypeRepositoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Form\ProjectTypeFormHelperInterface;

use App;

class ProjectTypeFormHelper extends BaseFormHelper implements ProjectTypeFormHelperInterface {

    protected $repository;


    public function __construct()
    {
        $this->repository = App::make( ProjectTypeRepositoryInterface::class );
    }

}
