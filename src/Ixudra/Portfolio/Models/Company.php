<?php namespace Ixudra\Portfolio\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Laracasts\Presenter\PresentableTrait;

class Company extends Model implements CustomerModelInterface {

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

    protected $presenter = '\Ixudra\Portfolio\Presenters\CompanyPresenter';


    public function corporateAddress()
    {
        return $this->belongsTo('\Ixudra\Portfolio\Models\Address', 'corporate_address_id');
    }

    public function billingAddress()
    {
        return $this->belongsTo('\Ixudra\Portfolio\Models\Address', 'billing_address_id');
    }

    public function representative()
    {
        return $this->belongsTo('\Ixudra\Portfolio\Models\Person', 'representative_id');
    }

    protected function customer()
    {
        return $this->morphOne('\Ixudra\Portfolio\Models\Customer', 'customer');
    }

    public function projects()
    {
        return $this->morphOne('\Ixudra\Portfolio\Models\Customer', 'customer')->first()->projects();
    }


    public static function getRules()
    {
        return array(
            'name'                  => 'required|max:256',
            'vat_nr'                => 'max:32',
            'email'                 => 'required|max:256',
            'url'                   => 'max:256',
            'phone'                 => 'required|max:32',
            'fax'                   => 'max:32',
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

        if( $this->representative->projects->isEmpty() ) {
            $this->representative->delete();
        }

        $this->customer->delete();

        parent::delete();
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
