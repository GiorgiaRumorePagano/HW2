<?php

use App\Models\Corso;

use Illuminate\Routing\Controller as BaseController;

class CorsiController extends BaseController
{

    public function corsi() {
        return view("corsi");
    }

    public function fetchCorsi(){
        return Corso::all();
    }

    public function Api2() {
        $client_id = 'e4f0bbe64bf246be98c4533a6c9b0094';
        $client_secret = 'b3803c2eae9b4bc392c56034bbbf9242';
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 
        echo(curl_exec($ch));
        curl_close($ch);  
    }
}

?>