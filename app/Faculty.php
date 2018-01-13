<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fakulteti';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['naziv'];

    public function participanti() 
    {
        return $this->belongsToMany(Participant::class, 'fakultet_participant', 'fakultet_id', 'participant_id');
    }
    
}
