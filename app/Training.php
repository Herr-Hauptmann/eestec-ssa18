<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'trainings';

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
    protected $fillable = ['title', 'description', 'image', 'trainer_id'];

    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }
    
}
