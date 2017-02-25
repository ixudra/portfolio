<?php namespace Ixudra\Portfolio\Services\Form;


use App;

use Ixudra\Core\Services\Form\BaseFormHelper;
use Ixudra\Portfolio\Interfaces\Services\Form\CompanyFormHelperInterface;

class CompanyFormHelper extends BaseFormHelper implements CompanyFormHelperInterface {

    protected $repository;


    public function __construct()
    {
        $this->repository = App::make( 'Ixudra\Portfolio\Interfaces\Repositories\CompanyRepositoryInterface' );
    }

}