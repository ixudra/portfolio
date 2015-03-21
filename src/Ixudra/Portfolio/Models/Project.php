<?php namespace Ixudra\Portfolio\Models;


use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Project extends Model {

    use PresentableTrait;


    protected $table = 'projects';

    protected $fillable = array(
        'name',
        'customer_id',
        'contractor_id',
        'description',
        'start_date',
        'end_date',
        'status',
        'project_type_id',
        'hidden'
    );

    protected $hidden = array();

    protected $translationKey = 'project';

    protected $presenter = '\Ixudra\Portfolio\Presenters\ProjectPresenter';


    public function customer()
    {
        return $this->belongsTo('\Ixudra\Portfolio\Models\Customer');
    }

    public function projectType()
    {
        return $this->belongsTo('\Ixudra\Portfolio\Models\ProjectType');
    }


    public static function getRules()
    {
        return array(
            'name'                  => 'required|max:64',
            'customer_id'           => 'required|integer',
            'contractor_id'         => 'required|integer',
            'description'           => 'required',
            'start_date'            => 'required|date',
            'end_date'              => 'required|date',
            'status'                => 'required|in:unknown,open,scheduled,in_development,completed,cancelled',
//            'price_id'              => 'required|integer',
            'project_type_id'       => 'required|integer',
            'hidden'                => 'required|boolean',
        );
    }

    public static function getDefaults()
    {
        return array(
            'name'                  => '',
            'customer_id'           => 0,
            'contractor_id'         => 0,
            'description'           => '',
            'start_date'            => date('Y-m-d'),
            'end_date'              => date('Y-m-d', strtotime('+1 week')),
            'status'                => 'open',
            'price_id'              => 0,
            'project_type_id'       => 0,
            'hidden'                => true,
        );
    }

}
