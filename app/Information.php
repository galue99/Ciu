<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = "informations";

    protected $fillable = array('name', 'lastname', 'dni','genere','address', 'country', 'state', 'city', 'phone', 'cellphone',
        'country_s', 'state_s', 'city_e', 'training_area', 'specialty', 'academic_degree_obtained', 'senior_year'
    );

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
