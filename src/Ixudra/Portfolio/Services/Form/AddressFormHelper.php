<?php namespace Ixudra\Portfolio\Services\Form;


use Ixudra\Core\Services\Form\BaseFormHelper;
use Ixudra\Portfolio\Interfaces\Services\Form\AddressFormHelperInterface;

use App;
use Config;
use Translate;

class AddressFormHelper extends BaseFormHelper implements AddressFormHelperInterface {

    protected $repository;


    public function __construct()
    {
        $this->repository = App::make('\Ixudra\Portfolio\Interfaces\Repositories\AddressRepositoryInterface');
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

    public function getCountriesAsSelectList($includeNull = false)
    {
        $countries = Config::get('international.countries');

        $results = array();
        if( $includeNull ) {
            $results[ 0 ] = Translate::recursive('portfolio::international.country.singular') .'...';
        }

        foreach( $countries as $country ) {
            $results[ $country ] = Translate::recursive('portfolio::international.countries.'. $country);
        }

        return $results;
    }

}