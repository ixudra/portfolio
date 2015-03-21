<?php namespace Ixudra\Portfolio\Models;


use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Customer extends Model {

    use PresentableTrait;


    protected $table = 'customers';

    protected $fillable = array(
        'first_name',
        'last_name',
        'email',
        'cellphone'
    );

    protected $guarded = array();

    protected $hidden = array();

    protected $translationKey = 'customer';

    protected $presenter = '\Ixudra\Portfolio\Presenters\CustomerPresenter';


    public function projects()
    {
        return $this->hasMany('\Ixudra\Portfolio\Models\Project');
    }


    public static function getRules()
    {
        return array(
            'first_name'            => 'required|max:64',
            'last_name'             => 'required|max:64',
            'email'                 => 'required|email',
            'cellphone'             => 'required|max:64'
        );
    }

    public static function getDefaults()
    {
        return array(
            'first_name'            => '',
            'last_name'             => '',
            'email'                 => '',
            'cellphone'             => ''
        );
    }

}
