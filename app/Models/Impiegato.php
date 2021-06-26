<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Impiegato extends Model 
{
    protected $table = "IMPIEGATO";
    protected $primaryKey = "ID_impiegato";
    public $timestamps = false;
    protected $hidden = [
        'Pass'
    ];

    public function istruttore(){
        return $this->hasOne('App\Models\Istruttore', 'ID_impiegato', 'ID_impiegato');
    }

    public function segretario(){
        return $this->hasOne('App\Models\Segretario', 'ID_impiegato', 'ID_impiegato');
    }

    public function addetto(){
        return $this->hasOne('App\Models\Addetto', 'ID_impiegato', 'ID_impiegato');
    }
}

?>