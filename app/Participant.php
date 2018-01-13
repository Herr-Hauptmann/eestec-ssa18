<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Participant';

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
    protected $fillable = ['ime', 'prezime', 'datum_rodjenja', 'broj_telefona', 'email', 'velicina_majice', 'engleski_govor', 'engleski_razumijevanje', 'motivaciono', 'ranije_ucesce_na_ssa', 'kako_ste_saznali', 'radno_iskustvo', 'trenutno_zaposlenje', 'ucesce_na_treninzima', 'ucesce_na_seminarima', 'nvo_iskustvo', 'dodatne_napomene'];

    
    
}
