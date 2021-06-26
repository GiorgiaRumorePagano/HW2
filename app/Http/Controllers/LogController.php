<?php



use Illuminate\Routing\Controller as BaseController;

class LogController extends BaseController
{
    
   public function log() {
        return view('login')
        ->with('csrf_token', csrf_token());
   }
}

?>