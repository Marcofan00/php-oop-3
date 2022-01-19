<!-- Definire classe User:
ATTRIBUTI (private):
- username 
- password
- age
METODI:
- costruttore che accetta username, e password
- proprieta' getter/setter
- printMe: che stampa se stesso
- toString: "username: age [password]"
ECCEZIONI:
- scatenare eccezione quando username e' minore di 3 caratteri o maggiore di 16
- scatenare eccezione se password non contiene un carattere speciale (non alpha-numerico)
- scatenare eccezione se age non e' un numero
NOTE:
- per testare il singolo carattere di una stringa
Testare la classe appena definita con dati corretti e NON corretti all'interno di un
try-catch e eventualmente informare l'utente del problema -->
<?php

class User{

    private $username;
    private $password;
    private $age;

    public function __construct($username,$password){
        $this-> setUsername($username);
        $this-> setpassword($password);
    }

    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        if(strlen($username)<3 || strlen($username)>16){
            throw new Exception("il tuo username deve avere un numero di caratteri tra un minimo di 3 e un massimo di 16");
        }else{
        $this-> username = $username;
        }
    }

    public function getpassword(){
        return $this->password;
    }
    public function setpassword($password){
        if(ctype_alnum($password)){
            throw new Exception("la password non contiene caratteri speciali");
        }else{
        $this-> password = $password;
        }
    }

    public function getage(){
        return $this->age;
    }
    public function setage($age){
        if(!is_numeric($age)){
            throw new Exception("l'età è valida solo in valori numerici");
        }else{
        $this-> age = $age;
        }
    }

    public function printMe(){
        echo $this; 
    }

    public function __toString(){
        return $this->username."<br>"." età : ". $this->age."<br>"."  la password:"."  [".$this->password."]";
    }
}
try{
    $p1= new User("Luca","fan/elli");
    $p1 ->setage("22");
    $p1 ->printMe();
}catch(Exception $e){
    echo $e. "<br><h1>" . $e -> getMessage() . "</h1>";
}

?>