<?php

use App\Models\Sede;

use Illuminate\Routing\Controller as BaseController;

class SediController extends BaseController
{

    public function sedi() {
        return view("sedi");
    }

    public function fetchSedi(){
        
        return Sede::all();
        


        
    }
}

?>