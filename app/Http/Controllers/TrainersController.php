<?php


use App\Models\Istruttore;


use Illuminate\Routing\Controller as BaseController;

class TrainersController extends BaseController
{

    public function trainers() {
        return view("trainers");
    }

    public function fetchTrainers(){
        
        return Istruttore::all()->map(function ($item) {
            return [
                'ID_impiegato' => $item->ID_impiegato,
                'Nome' => $item->impiegato->Nome,
                'Cognome' => $item->impiegato->Cognome,
                'Specializzazione' => $item->Specializzazione
            ];
        });
    }
}

?>