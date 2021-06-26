<?php

use App\Models\Impiegato;
use App\Models\Istruttore;
use App\Models\Segretario;
use App\Models\Addetto;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;

class SignUpController extends BaseController
{
    
   public function signUp() {
      if(session('id_impiegato')!= null)
         return view('home_riservata');
      else 
         return view('signup')->with('csrf_token', csrf_token()); 
   }

   public function checkCodiceFiscale($query) {
      $exists = Impiegato::where("C_F", $query)->exists();
      return ['exists' => $exists];
   }

   public function checkEmail($query) {
      $exists = Impiegato::where("Posta_elettronica", $query)->exists();
      return ['exists' => $exists];
   }

   public function create() {
      if(!request('codice') || !request('nome') || !request('cognome') || !request('data_nascita') || !request('email') || !request('password') || !request('conferma') || !request('indirizzo') || !request('citta') || !request('telefono')){
          return redirect('signup')
                      ->withErrors("Riempire tutti i campi!")
                      ->withInput();
      }else{
          $errors = array();

         if(Impiegato::where('Posta_elettronica', request('email'))->exists())
            $errors[] = "Email già in uso";

         if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,15}$/', $_POST['password'])) {
            $error[] = "La password deve contenere un carattere minuscolo, uno maiuscolo, un numero, un carattere speciale (!@#$^&*) e deve essere formata da 8-15 caratteri";
         }

         if (strcmp($_POST["password"], $_POST["conferma"]) != 0) {
            $error[] = "Le password non coincidono";
         }

         if(!preg_match('/^\d{10}$/', $_POST['telefono'])) {
              $errors[] = "Numero di telefono non valido";
         }

         if(!isset($_POST['segretario']) && !isset($_POST['istruttore']) && !isset($_POST['addetto_pulizie'])) {
            $error[] = "Selezionare almeno un ruolo";
         }

         if(count($errors) == 0 ) {

            $data_nascita = request('data_nascita');
            if(str_contains($data_nascita, "/"))
               $data_nascita = str_replace('/', '-', $data_nascita);  
            if(str_contains(request('data_nascita'), "."))
               $data_nascita = str_replace('.', '-', $data_nascita);
            $data = new DateTime($data_nascita);
            $data = $data->format('Y-m-d');

              $impiegato = new Impiegato();
              $impiegato->C_F = request('codice');
              $impiegato->Nome = request('nome');
              $impiegato->Cognome = request('cognome');
              $impiegato->Data_nascita = $data;
              $impiegato->Indirizzo = request('indirizzo');
              $impiegato->Citta = request('citta');
              $impiegato->Posta_elettronica = request('email');
              $impiegato->Telefono = request('telefono');
              $impiegato->Pass = bcrypt(request('password'));   
              $impiegato->Save();
              
              if(isset($_POST['segretario'])){
                  $impiegato->segretario()->create();
                  
              }

              if(isset($_POST['istruttore'])){
               $impiegato->istruttore()->create();
              
              }

              if(isset($_POST['addetto_pulizie'])){
               $impiegato->addetto()->create();
              }

              return redirect('registrazione_ok');
          }
          else
              return redirect('signup')
                      ->withErrors($errors)
                      ->withInput();
      }

  }
}

?>