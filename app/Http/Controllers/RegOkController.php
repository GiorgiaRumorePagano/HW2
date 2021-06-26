<?php


use Illuminate\Routing\Controller as BaseController;

class RegOkController extends BaseController
{
    
   public function ok() {
        return view('registrazione_ok'); 
   }

}

?>