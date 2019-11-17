<?php namespace Ixudra\Portfolio\Services\Form;


use Ixudra\Core\Services\Form\BaseFormHelper;
use Ixudra\Portfolio\Interfaces\Repositories\PersonRepositoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Form\PersonFormHelperInterface;

use App;

class PersonFormHelper extends BaseFormHelper implements PersonFormHelperInterface {

    protected $repository;


    public function __construct()
    {
        $this->repository = App::make( PersonRepositoryInterface::class );
    }


    protected function getName($model)
    {
        return $model->present()->fullName;
    }

}
