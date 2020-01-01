<?php namespace Ixudra\Portfolio\Models;


use Illuminate\Database\Eloquent\Model;
use Ixudra\Portfolio\Interfaces\Models\CompanyInterface;
use Ixudra\Portfolio\Presenters\CompanyPresenter;
use Laracasts\Presenter\PresentableTrait;

use Config;

class Company extends Model implements CompanyInterface {

    use PresentableTrait;


    protected $table = 'companies';

    protected $fillable = array(
        'name',
        'vat_nr',
        'email',
        'url',
        'phone',
        'fax',
        'billing_address_id',
        'corporate_address_id',
        'representative_id',
    );

    protected $guarded = array();

    protected $hidden = array();

    protected $translationKey = 'company';

    protected $presenter = CompanyPresenter::class;


    public function corporateAddress()
    {
        return $this->belongsTo( Config::get('bindings.models.address'), 'corporate_address_id' );
    }

    public function billingAddress()
    {
        return $this->belongsTo( Config::get('bindings.models.address'), 'billing_address_id' );
    }

    public function representative()
    {
        return $this->belongsTo( Config::get('bindings.models.person'), 'representative_id' );
    }

    protected function customer()
    {
        return $this->morphOne( Config::get('bindings.models.customer'), 'customer' );
    }

    public function projects()
    {
        return $this->morphOne( Config::get('bindings.models.customer'), 'customer' )->first()->projects();
    }


    public function getCorporateAddress()
    {
        return $this->corporateAddress;
    }

    public function getBillingAddress()
    {
        return $this->billingAddress;
    }


    public static function getRules()
    {
        return array(
            'name'                  => 'required|max:256',
            'vat_nr'                => 'nullable|max:32',
            'email'                 => 'required|max:256',
            'url'                   => 'nullable|max:256',
            'phone'                 => 'nullable|max:32',
            'fax'                   => 'nullable|max:32',
        );
    }

    public static function getDefaults()
    {
        return array(
            'name'                  => '',
            'vat_nr'                => '',
            'email'                 => '',
            'url'                   => '',
            'phone'                 => '',
            'fax'                   => '',
        );
    }

    public function delete()
    {
        $this->corporateAddress->delete();
        if( $this->billingAddress ) {
            $this->billingAddress->delete();
        }

        parent::delete();

        if( $this->representative->projects->isEmpty() ) {
            $this->representative->delete();
        }

        $this->customer->delete();
    }

    public function getSingular()
    {
        return 'company';
    }

    public function getPlural()
    {
        return 'companies';
    }

    public function getSortingName()
    {
        return $this->name;
    }

}
