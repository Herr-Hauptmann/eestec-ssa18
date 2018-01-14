<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontakt extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'kontakts';

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
    protected $fillable = ['pozicija', 'ime', 'prezime', 'email', 'telefon', 'pozicija_short'];

    
}
