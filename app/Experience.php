<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'experiences';

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
    protected $fillable = ['title', 'position', 'from_month', 'to_month', 'from_year', 'to_year', 'content', 'type', 'participant_id'];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function certificate()
    {
        return $this->hasOne(Certificate::class);
    }
}
