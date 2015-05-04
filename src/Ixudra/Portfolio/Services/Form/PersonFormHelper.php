<?php namespace Ixudra\Portfolio\Services\Form;


use Ixudra\Core\Services\Form\BaseFormHelper;
use Ixudra\Portfolio\Interfaces\Services\Form\PersonFormHelperInterface;

use App;

class PersonFormHelper extends BaseFormHelper implements PersonFormHelperInterface {

    protected $repository;


    public function __construct()
    {
        $this->repository = App::make('\Ixudra\Portfolio\Interfaces\Repositories\PersonRepositoryInterface');
    }


    protected function convertToSelectList($includeNull, $models)
    {
        $results = array();
        if( $includeNull ) {
            $results[ 0 ] = '';
        }

        foreach( $models as $model ) {
            $results[ $model->id ] = $model->present()->fullName;
        }

        return $results;
    }

}