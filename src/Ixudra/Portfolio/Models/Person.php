<?php namespace Ixudra\Portfolio\Models;


use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Person extends Model implements CustomerModelInterface {

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

    protected $presenter = '\Ixudra\Portfolio\Presenters\PersonPresenter';


    public function address()
    {
        return $this->belongsTo('\Ixudra\Portfolio\Models\Address');
    }

    public function company()
    {
        return $this->hasOne('\Ixudra\Portfolio\Models\Company', 'representative_id');
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
        if( $this->address ) {
            $this->address->delete();
        }
        $this->customer->delete();

        parent::delete();
    }

    public function getUrlKey()
    {
        return 'people';
    }

}
