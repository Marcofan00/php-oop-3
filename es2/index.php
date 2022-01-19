<!-- Definire classe Computer:
ATTRIBUTI:
- codice univoco
- modello
- prezzo
- marca
METODI:
- costruttore che accetta codice univoco e prezzo
- proprieta' getter/setter per tutte le variabili d'istanza
- printMe: che stampa se stesso (come quella vista a lezione)
- toString: "marca modello: prezzo [codice univoco]"
ECCEZIONI:
- codice univoco: deve essere composto da esattamente 6 cifre (no altri caratteri)
- marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
- prezzo: deve essere un valore intero compreso tra 0 e 2000
Testare la classe appena definita con tutte le casistiche interessanti per verificare
il corretto funzionamento dell'algoritmo -->

<?php
    class Computer
    {
        private $id;
        private $model;
        private $price;
        private $brand;

        public function __construct($id, $price)
        {
            $this->setId($id);
            $this->setPrice($price);
        }

        public function getId()
        {
            return $this->id;
        }
        public function setId($id)
        {
            if (strlen($id) != 6) {
                throw new Exception("La password deve contenere 6 cifre");
            } else {
                $this->id = $id;
            }
        }

        public function getModel()
        {
            return $this->model;
        }
        public function setModel($model)
        {
            if (is_numeric($model) || strlen($model) < 3 || strlen($model) > 20)
                throw new Exception("Il modello deve avere una lunghezza compresa tra 3 e 20 caratteri");
            $this->model = $model;
        }

        public function getPrice()
        {
            return $this->price;
        }
        public function setPrice($price)
        {
            if (!is_int($price) || $price < 0 || $price > 2000)
                throw new Exception("Il prezzo deve essere un numero intero e non può superare le 2000 cifre.");
            $this->price = $price;
        }

        public function getBrand()
        {
            return $this->brand;
        }
        public function setBrand($brand)
        {
            if (is_numeric($brand) || strlen($brand) < 3 || strlen($brand) > 20)
                throw new Exception("La marca può avere un numero di caratteri compresi tra 3 e 20");
            $this->brand = $brand;
        }

        public function printMe()
        {
            echo $this;
        }

        public function __toString()
        {

            return "Id:" . $this->getId() . "<br> Computer: " . $this->getBrand() . " [ " . $this->getModel() . " ]  " . "<br>price: " . $this->getPrice() . "$";
        }
    }

    try {
        $c1 = new Computer("546374", 1299);
        $c1->setBrand("Apple");
        $c1->setModel("MacBook Air");
        $c1->printMe();
    } catch (Exception $e) {
        echo "<br>" . $e->getMessage();
    }

    ?>