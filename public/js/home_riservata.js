if(tipo.segretario == "true"){
    console.log("segretario");
    const op = document.querySelectorAll(".segretario");
    for (p of op ) p.classList.remove('hidden');
}
if(tipo.addetto == "true"){
    console.log("addetto");
    const op = document.querySelectorAll(".addetto");
    for (p of op ) p.classList.remove('hidden');
}

if(tipo.istruttore == "true"){
    console.log("istruttore");
    const op = document.querySelectorAll(".istruttore");
    for (p of op ) p.classList.remove('hidden');
}

fetch("operazioni/1").then(onResponse).then(onJsonOperazione1)

const button_op2 = document.querySelector('#operazione-2  button');
const id_sede_ingresso = document.querySelector("#operazione-2 input")
button_op2.addEventListener('click', FetchOperazione2);



function FetchOperazione2 (event){
    event.preventDefault();
    fetch("operazioni/2/"+id_sede_ingresso.value).then(onResponse).then(onJsonOperazione2)
}

fetch("get_id_corso").then(onResponse).then(onJsonGetCorso);
const id_corso = document.querySelector('#id_corso');

function onJsonGetCorso(json) {

    id_corso.value = parseInt(json.ID_corso)+1;
}

fetch("get_id_istruttore").then(onResponse).then(onJsonGetIstruttore);
const select = document.querySelector("#operazione-3 form select");

function onJsonGetIstruttore(json) {
    for(content of json) {
        const id_istruttore = document.createElement('option');
        id_istruttore.classList.add("scelta_istruttore") 
        id_istruttore.textContent = content.ID + " - " + content.nome + " " +  content.cognome;
        id_istruttore.value = content.ID;
        select.appendChild(id_istruttore);
    }
}

const button_op3 = document.querySelector('#operazione-3 button');
button_op3.addEventListener('click', FetchOperazione3);
const nome_corso = document.querySelector('#nome_corso');
const prezzo_corso = document.querySelector('#prezzo_corso');
const iscritti_corso = document.querySelector('#iscritti_corso');
const eta_corso = document.querySelector('#eta_corso');
const istruttore_corso = document.querySelector('#istruttore_corso');



function FetchOperazione3(event) {
    event.preventDefault();
    let eta;
    if(eta_corso.value.includes( "/"))
        eta = eta_corso.value.replace("/", "-");
    console.log(eta);  
    fetch("operazioni/3/"+id_corso.value+"/"+nome_corso.value+"/"+prezzo_corso.value+"/"+iscritti_corso.value+"/"+eta+"/"+select.value).then(onResponse).then(onJsonOperazione3)
}



fetch("operazioni/4").then(onResponse).then(onJsonOperazione4);

function onResponse (response) {
    return response.json();
}




function onJsonOperazione1(json) {
    for(content of json) {
        const div = document.querySelector('#operazione-1');
        const id = document.querySelector('#operazione-1 span');
        id.textContent = "ID: " + content.id_istruttore + "\n" + "Specializzazione: " + content.specializzazione_istruttore + "\n" + "Numero di corsi: " + content.numero_corsi_istruttore ;
    }
}
const form2 = document.getElementById("form2");

function onJsonOperazione2(json) {
    console.log(json);
    const id = document.querySelector('#operazione-2 span');

    for(content of json) {
        const div = document.querySelector('#operazione-2');
        
        id.textContent += "\n ID impiegato: " + content.id_impiegato + " " + "ID sede: " + content.id_sede + " " + "Nome: " + content.nome + " " + "Cognome: " + content.cognome + " " + "Codice fiscale: " + " " + content.codice_fiscale;
    }
    id.textContent += "\n\r";
   
}



const form = document.getElementById("form3");
function onJsonOperazione3(json) {
    alert("Inserimento avvenuto correttamente");
    form.reset();
    fetch("get_id_corso").then(onResponse).then(onJsonGetCorso);
    fetch("get_id_istruttore").then(onResponse).then(onJsonGetIstruttore);
}

function onJsonOperazione4(json) {
    for(content of json) {
        const div = document.querySelector('#operazione-4');
        const id = document.querySelector('#operazione-4 span');
        id.textContent = "ID: " + content.id_iscritto + "\n" + "Nome: " + content.nome_iscritto+ "\n" + "Cognome: " + content.cognome_iscritto + "\n" + "Numero di corsi: " + content.numero_corsi_iscritto;
    }
}

document.querySelector('#operazione-1 h3').addEventListener('click', MostraOp1);
document.querySelector('#operazione-2 h3').addEventListener('click', MostraOp2);
document.querySelector('#operazione-3 h3').addEventListener('click', MostraOp3);
document.querySelector('#operazione-4 h3').addEventListener('click', MostraOp4);

function MostraOp1 (event) {
    const operazione = event.currentTarget;
    operazione.removeEventListener('click', MostraOp1);

    const risultato = document.querySelector("#operazione-1 span");
    risultato.classList.remove('hidden');

    operazione.addEventListener('click', ChiudiOp1);
}

function MostraOp2 (event) {
    const operazione = event.currentTarget;
    operazione.removeEventListener('click', MostraOp2);

    const ricerca = document.querySelector("#operazione-2 form");
    ricerca.classList.remove('hidden');

    operazione.addEventListener('click', ChiudiOp2);
}

function MostraOp3 (event) {
    const operazione = event.currentTarget;
    operazione.removeEventListener('click', MostraOp3);

    const form = document.querySelector("#operazione-3 form");
    form.classList.remove('hidden');

    operazione.addEventListener('click', ChiudiOp3);
}

function MostraOp4 (event) {
    const operazione = event.currentTarget;
    operazione.removeEventListener('click', MostraOp1);

    const risultato = document.querySelector("#operazione-4 span");
    risultato.classList.remove('hidden');

    operazione.addEventListener('click', ChiudiOp4);
}



function ChiudiOp1(event) {
    const operazione = event.currentTarget;
    operazione.removeEventListener('click', ChiudiOp1);

    const risultato = document.querySelector("#operazione-1 span");
    risultato.classList.add('hidden');

    
    operazione.addEventListener('click', MostraOp1);
}

function ChiudiOp2(event) {
    const operazione = event.currentTarget;
    operazione.removeEventListener('click', ChiudiOp2);

    const ricerca = document.querySelector("#operazione-2 form");
    ricerca.classList.add('hidden');

    
    operazione.addEventListener('click', MostraOp2);
}

function ChiudiOp3(event) {
    const operazione = event.currentTarget;
    operazione.removeEventListener('click', ChiudiOp3);

    const form = document.querySelector("#operazione-3 form");
    form.classList.add('hidden');

    
    operazione.addEventListener('click', MostraOp3);
}

function ChiudiOp4(event) {
    const operazione = event.currentTarget;
    operazione.removeEventListener('click', ChiudiOp4);

    const risultato = document.querySelector("#operazione-4 span");
    risultato.classList.add('hidden');

    
    operazione.addEventListener('click', MostraOp4);
}

//RICERCA ISCRITTI------------------------------------------
const ricerca = document.querySelector("#ricerca input");
ricerca.addEventListener('keyup', cerca);


function cerca(event) {
    if(ricerca.value) {
        fetch("cerca/" + ricerca.value).then(onResponse).then(onJsonCerca);
    } else Svuota(); 
}

function Svuota() {
    risultati.innerHTML = "";
}

function onJsonCerca(json) {
    Svuota();

    const row = document.createElement('span');

    const tabella = document.createElement('table');
    const id = document.createElement('th');
    id.textContent = "ID";
    tabella.appendChild(id);
    const nome = document.createElement('th');
    nome.textContent = "Nome";
    tabella.appendChild(nome);
    const cognome = document.createElement('th');
    cognome.textContent = "Cognome";
    tabella.appendChild(cognome);
    const nascita= document.createElement('th');
    nascita.textContent = "Data di nascita";
    tabella.appendChild(nascita);
    const cf = document.createElement('th');
    cf.textContent = "Codice Fiscale";
    tabella.appendChild(cf);
    const indirizzo = document.createElement('th');
    indirizzo.textContent = "Indirizzo";
    tabella.appendChild(indirizzo);
    const citta = document.createElement('th');
    citta.textContent = "Citta";
    tabella.appendChild(citta);
    const telefono = document.createElement('th');
    telefono.textContent = "Telefono";
    tabella.appendChild(telefono);
    const email = document.createElement('th');
    email.textContent = "Email";
    tabella.appendChild(email);
    const tessera = document.createElement('th');
    tessera.textContent = "Tessera";
    tabella.appendChild(tessera);
    const prezzo_tessera = document.createElement('th');
    prezzo_tessera.textContent = "Prezzo tessera";
    tabella.appendChild(prezzo_tessera);




    let totale = 0;
    const risultati = document.querySelector('#risultati');
    risultati.appendChild(tabella);
    for (content of json) {
        const riga = document.createElement('tr');
        risultati.appendChild(riga);
        tabella.appendChild(riga);
        const id = document.createElement('td');
        id.textContent = content.ID_iscritto;
        riga.appendChild(id);
        const nome = document.createElement('td');
        nome.textContent = content.Nome;
        riga.appendChild(nome);
        const cognome = document.createElement('td');
        cognome.textContent = content.Cognome;
        riga.appendChild(cognome);
        const nascita = document.createElement('td');
        nascita.textContent = content.Data_nascita
        riga.appendChild(nascita);
        const codice_fiscale = document.createElement('td');
        codice_fiscale.textContent = content.C_F;
        riga.appendChild(codice_fiscale);
        const indirizzo = document.createElement('td');
        indirizzo.textContent = content.Indirizzo;
        riga.appendChild(indirizzo);
        const citta = document.createElement('td');
        citta.textContent = content.Citta;
        riga.appendChild(citta);
        const telefono = document.createElement('td');
        telefono.textContent = content.Telefono;
        riga.appendChild(telefono);
        const email= document.createElement('td');
        email.textContent = content.Posta_elettronica;
        riga.appendChild(email);
        const tessera = document.createElement('td');
        tessera.textContent = content.ID_tessera;
        riga.appendChild(tessera);
        const prezzo_tessera = document.createElement('td');
        prezzo_tessera.textContent = content.Prezzo_tessera;
        riga.appendChild(prezzo_tessera);
        tabella.appendChild(document.createElement('tr'));
        

    }
}






