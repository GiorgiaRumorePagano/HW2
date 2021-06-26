<?php

use App\Models\Impiegato;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as Session;

class LoginController extends BaseController
{

    public function login($redirect = "home_riservata") {
        if($this->isLogged() == "true"){
            return redirect($redirect);
        }
        else{
            return view('login')
                ->with('csrf_token', csrf_token());
        }
    }


    public function checkLogin($redirect = "home_riservata") {
        if(!request('codice') || !request('password')) {
            return redirect('login')//.$redirect)
                        ->withErrors("Inserisci codice fiscale e/o password")
                        ->withInput();
        }else{
            $impiegato = Impiegato::where('C_F', request('codice'))->first();
            
            if(isset($impiegato) && Hash::check(request('password'), $impiegato->Pass)) {

                $tipo = new stdClass();
                $tipo->addetto=$impiegato->addetto()->exists();
                $tipo->istruttore=$impiegato->istruttore()->exists();
                $tipo->segretario=$impiegato->segretario()->exists();
                Session::put('tipo', $tipo);

                if((request('remember'))!==null)  {

                    $expires = strtotime("+7 day");
                    $cookie = (object) array( "ID_impiegato" => $impiegato->ID_impiegato, "Nome" => $impiegato->Nome, "C_F" => $impiegato->C_F, 
                    "tipo" => $tipo ,"expires" => $expires, "hash" => hash('sha256',$impiegato->C_F));
                    setcookie('_web_ID', json_encode( $cookie), $expires); //Nome del cookie = _web_ID
                }


                Session::put('id_impiegato', $impiegato->ID_impiegato);
                Session::put('nome_impiegato', $impiegato->Nome);
                Session::put('cf_impiegato', $impiegato->C_F);

                
                return redirect($redirect);
            }else {
                return redirect('login')->withErrors("Credenziali errate")->withInput();
            }
        }
    }

    public static function checkAuth(){
        if(isset($_COOKIE['_web_ID'])){
            $cookie = json_decode($_COOKIE['_web_ID'], false);
            
            
            if(hash('sha256',$cookie->C_F)==$cookie->hash){
                Session::put('id_impiegato', $cookie->ID_impiegato);
                Session::put('nome_impiegato', $cookie->Nome);
                Session::put('cf_impiegato', $cookie->C_F);
                Session::put('tipo', $cookie->tipo);
                //dd($cookie);
                
            }
        }
    }

    public static function isLogged(){
        (new LoginController)->checkAuth();
        return session('id_impiegato') ? "true" : "false";
    }

    public function logout() {
        Session::flush(); 

        setcookie("_web_ID","",0);
        return redirect('login');
    }


}

?>