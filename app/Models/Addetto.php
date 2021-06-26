<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Addetto extends Model 
{
    protected $table = "ADETTO_PULIZIE";
    protected $primaryKey = "ID_impiegato";
    public $timestamps = false;
/*
    public function impiegato() {
        return $this->belongsTo('Impiegato','ID_impiegato','ID_impiegato');
    }
*/
    
}

?>