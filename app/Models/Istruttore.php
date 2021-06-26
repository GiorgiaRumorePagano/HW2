<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Istruttore extends Model 
{
    protected $table = "ISTRUTTORE";
    protected $primaryKey = "ID_impiegato";
    public $timestamps = false;

    public function impiegato() {
        return $this->belongsTo('App\Models\Impiegato','ID_impiegato','ID_impiegato');
    }

    
}

?>