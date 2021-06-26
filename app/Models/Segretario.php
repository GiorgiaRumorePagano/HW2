<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Segretario extends Model 
{
    protected $table = "SEGRETARIO";
    protected $primaryKey = "ID_impiegato";
    public $timestamps = false;
/*
    public function impiegato() {
        return $this->belongsTo('Impiegato','ID_impiegato','ID_impiegato');
    }
*/
    
}

?>