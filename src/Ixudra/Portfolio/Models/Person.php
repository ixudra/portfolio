<?php namespace Ixudra\Portfolio\Models;


use Illuminate\Database\Eloquent\Model;
use Ixudra\Portfolio\Interfaces\Models\PersonInterface;
use Laracasts\Presenter\PresentableTrait;

use Config;
use Translate;

class Person extends Model implements PersonInterface {

    use PresentableTrait;


    protected $table = 'people';

    protected $fillable = array(
        'first_name',
        'last_name',
        'birth_date',
        'email',
        'cellphone',
        'address_id'
    );

    protected $guarded = array();

    protected $hidden = array();

    protected $translationKey = 'person';

//    protected $presenter = '\Ixudra\Portfolio\Presenters\PersonPresenterInterface';
    protected $presenter = '\Ixudra\Portfolio\Presenters\PersonPresenter';


    public function address()
    {
        return $this->belongsTo( Config::get('bindings.models.address') );
    }

    public function company()
    {
        return $this->hasOne( Config::get('bindings.models.company'), 'representative_id' );
    }

    protected function customer()
    {
        return $this->morphOne( Config::get('bindings.models.customer'), 'customer' );
    }

    public function projects()
    {
        return $this->morphOne( Config::get('bindings.models.customer'), 'customer' )->first()->projects();
    }


    public static function getRules()
    {
        return array(
            'first_name'                => 'required|max:256',
            'last_name'                 => 'required|max:256',
            'birth_date'                => 'required|date|date_format:Y-m-d',
            'email'                     => 'required|email|max:256',
            'cellphone'                 => 'required|max:32',
        );
    }

    public static function getDefaults()
    {
        return array(
            'first_name'                => '',
            'last_name'                 => '',
            'birth_date'                => '',
            'email'                     => '',
            'cellphone'                 => '',
        );
    }

    public function delete()
    {
        if( !is_null($this->company) ) {
            throw new \Exception( 'portfolio::exceptions.delete.companyRepresentative' );
        }

        if( $this->address ) {
            $this->address->delete();
        }

        $this->customer->delete();

        parent::delete();
    }

    public function getSingular()
    {
        return 'person';
    }

    public function getPlural()
    {
        return 'people';
    }

    public function getSortingName()
    {
        return $this->last_name .' '. $this->first_name;
    }

}
