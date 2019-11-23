<?php namespace Ixudra\Portfolio\Services\Form;


use Ixudra\Addressable\Services\Form\AddressFormHelper as AddressableFormHelper;
use Ixudra\Portfolio\Interfaces\Repositories\AddressRepositoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Form\AddressFormHelperInterface;

use App;
use Config;
use Translate;

class AddressFormHelper extends AddressableFormHelper implements AddressFormHelperInterface {

    protected $repository;


    public function __construct()
    {
        $this->repository = App::make( AddressRepositoryInterface::class );
    }


    protected function getName($model)
    {
        return $model->present()->name;
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
