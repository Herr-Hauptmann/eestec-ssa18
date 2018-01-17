<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'trainers';

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
    protected $fillable = ['name', 'about', 'image'];

    public function training() {
        return $this->hasOne(Training::class);
    }
}
