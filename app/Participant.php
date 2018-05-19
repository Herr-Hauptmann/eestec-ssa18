<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Participant extends Model
{
    use Notifiable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'participanti';

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
    protected $fillable = ['ime', 'prezime', 'datum_rodjenja', 'broj_telefona', 'email', 'velicina_majice', 'engleski_govor', 'engleski_razumijevanje', 'motivaciono', 'ranije_ucesce_na_ssa', 'kako_ste_saznali', 'radno_iskustvo', 'trenutno_zaposlenje', 'ucesce_na_treninzima', 'ucesce_na_seminarima', 'nvo_iskustvo', 'dodatne_napomene', 
        'accepted', 'ukupno_bodova', 'asterix', 'glasali_count', 'status', 'mjesto_prebivalista', 'user_id', 'slika'];

    public function fakulteti() {
        return $this->belongsToMany(Faculty::class, 'fakultet_participant', 'participant_id', 'fakultet_id');
    }

    public function points()
    {
        return $this-hasMany(Point::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    
    public function certificates()
    {
        return $this->hasManyThrough(Certificate::class, Experience::class);
    }
}
