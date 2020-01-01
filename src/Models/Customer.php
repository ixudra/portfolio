<?php namespace Ixudra\Portfolio\Models;


use Illuminate\Database\Eloquent\Model;
use Ixudra\Portfolio\Interfaces\Models\CustomerInterface;
use Ixudra\Portfolio\Presenters\CustomerPresenter;
use Laracasts\Presenter\PresentableTrait;

use Config;

class Customer extends Model implements CustomerInterface {

    use PresentableTrait;


    protected $table = 'customers';

    protected $fillable = array(
        'name',
        'customer_type',
        'customer_id',
    );

    protected $guarded = array();

    protected $hidden = array();

    protected $translationKey = 'customer';

    protected $presenter = CustomerPresenter::class;


    public function object()
    {
        return $this->morphTo('customer');
    }

    public function projects()
    {
        return $this->hasMany( Config::get('bindings.models.project') );
    }


    public function getCorporateAddress()
    {
        return $this->object->getCorporateAddress();
    }

    public function getBillingAddress()
    {
        return $this->object->getBillingAddress();
    }

    public function isCompany()
    {
        $companyClass = Config::get('bindings.models.company');

        return $this->object instanceof $companyClass;
    }


    public static function getRules()
    {
        return array(
            'name'                      => 'required|max:128',
            'customer_type'             => 'required|max:64',
            'customer_id'               => 'required|integer',
        );
    }

    public static function getDefaults()
    {
        return array(
            'name'                      => '',
            'customer_type'             => '',
            'customer_id'               => 0,
        );
    }

    public function delete()
    {
        foreach( $this->projects as $project ) {
            $project->delete();
        }

        parent::delete();
    }

}
