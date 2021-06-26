<?php

use App\Models\Corso;
use App\Models\Iscritto;
use App\Models\Istruttore;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class RiservataController extends BaseController
{

   
    
   public function areaRiservata() {
      if((new LoginController)->isLogged() == "false"){
         return redirect('login');
     }
     else{
         return view('home_riservata')
             ->with('csrf_token', csrf_token());
     }
   }



   public function RicercaIscritti($q) {
      $ricerca = Iscritto::get()->map(function ($item) use ($q) {
         return ([
            "ID_iscritto" => $item->ID_iscritto,
            'Nome' => $item->Nome,
            'Cognome' => $item->Cognome,
            'Data_nascita' => $item->Data_nascita,
            'età' => $item->età,
            'C_F' => $item->C_F,
            'Indirizzo' => $item->Indirizzo,
            'Citta' => $item->Citta,
            'Telefono' => $item->Telefono,
            'Posta_elettronica' => $item->Posta_elettronica,
            'ID_tessera' => $item->ID_tessera,
            'Prezzo_tessera' => $item->Prezzo_tessera,
            'Ricerca' => ($item->Nome. " " .$item->Cognome)
         ]);
      });
      $output = array();
      foreach($ricerca as $r) {
         if(str_contains(strtolower($r['Ricerca']), strtolower($q))) 
            $output[]=$r;
      }
      return $output;
   }

   public function operazione1(){
      $id = Session('id_impiegato');
      if($id == null) return;
      DB::select('CALL OP1_2(?,@id1_2,@specializzazione1_2,@numero_corsi1_2)', array($id));
      return DB::select('SELECT @id1_2 as id_istruttore ,@specializzazione1_2 as specializzazione_istruttore, @numero_corsi1_2 as numero_corsi_istruttore');
   }  

   public function operazione2($id_sede){
      $id = Session('id_impiegato');
      if($id == null) return;
      return DB::select('CALL OP2_2(?,?)', array($id, $id_sede));
   }

   public function operazione3($id_corso, $nome_corso, $prezzo_corso, $iscritti_corso, $eta_corso, $istruttore_corso ){
      if(str_contains($eta_corso, "-"))
         $eta_corso = str_replace('-', '/', $eta_corso);  
      $id = Session('id_impiegato');
      if($id == null) return;
      return DB::select('CALL OP3_2(?,?,?,?,?,?,?)', array($id, $id_corso, $nome_corso, $prezzo_corso, $iscritti_corso, $eta_corso, $istruttore_corso));
   }

   public function operazione4(){
      $id = Session('id_impiegato');
      if($id == null) return;
      DB::select('CALL OP4_2(?,@ID4_2, @NomeIscritto4_2, @CognomeIscritto4_2, @ncorsi4_2)', array($id));
      return DB::select("SELECT @ID4_2 as id_iscritto,@NomeIscritto4_2 as nome_iscritto,@CognomeIscritto4_2 as cognome_iscritto,@ncorsi4_2 as numero_corsi_iscritto;");

   }

   public function getIdIstruttore(){
      $id = Session('id_impiegato');
      if($id == null) return;
      return Istruttore::all()->map( function ($item){
            return[
               'ID' => $item->ID_impiegato,
               'nome' => $item->impiegato->Nome,
               'cognome' => $item->impiegato->Cognome
            ];
      });        
   }

   public function getIdCorso(){
      $id = Session('id_impiegato');
      if($id == null) return;
      return Corso::orderBy('ID_corso', 'DESC')->first()->only('ID_corso');
   }

}

?>