<?php namespace Ixudra\Portfolio\Services\Form;


use Illuminate\Support\Str;
use Ixudra\Core\Services\Form\BaseFormHelper;

use App;
use Translate;

class AddressFormHelper extends BaseFormHelper {

    protected $repository;


    public function __construct()
    {
        $this->repository = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository');
    }


    protected function convertToSelectList($includeNull, $models)
    {
        $results = array();
        if( $includeNull ) {
            $results[ 0 ] = '';
        }

        foreach( $models as $model ) {
            $results[ $model->id ] = $model->present()->name;
        }

        return $results;
    }

    protected function convertToAutoComplete($models)
    {
        $results = array();
        foreach( $models as $model ) {
            $results[] = array(
                'data'          => $model->id,
                'value'         => $model->present()->name
            );
        }

        return $results;
    }

    public function getCitiesAsSelectList($includeNull = false)
    {
        $models = $this->repository->all();

        $results = array();
        if( $includeNull ) {
            $results[ 0 ] = Translate::recursive('portfolio::members.city') .'...';
        }

        foreach( $models as $model ) {
            if( !in_array( $model->city, $results ) ) {
                $results[ $model->id ] = $model->city;
            }
        }

        return $results;
    }

}