<?php namespace Ixudra\Portfolio\Models;


use Illuminate\Database\Eloquent\Model;
use Ixudra\Portfolio\Interfaces\Models\AddressInterface;
use Ixudra\Portfolio\Presenters\AddressPresenter;
use Laracasts\Presenter\PresentableTrait;

class Address extends Model implements AddressInterface {

    use PresentableTrait;


    protected $table = 'addresses';

    protected $fillable = array(
        'street_1',
        'street_2',
        'number',
        'box',
        'district',
        'postal_code',
        'city',
        'country',
    );

    protected $guarded = array();

    protected $hidden = array();

    protected $translationKey = 'address';

    protected $presenter = AddressPresenter::class;


    public static function getRules()
    {
        return array(
            'street_1'              => 'required|max:256',
            'street_2'              => 'max:256',
            'number'                => 'required|integer',
            'box'                   => 'max:32',
            'district'              => 'max:128',
            'postal_code'           => 'required|max:32',
            'city'                  => 'required|max:128',
            'country'               => 'required|max:2',
        );
    }

    public static function getDefaults()
    {
        return array(
            'street_1'              => '',
            'street_2'              => '',
            'number'                => '',
            'box'                   => '',
            'district'              => '',
            'postal_code'           => '',
            'city'                  => '',
            'country'               => 'be',
        );
    }

}