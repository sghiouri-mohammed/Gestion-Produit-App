<?php
    class Produit
    {
        public $reference;
        public $prixUnitaire;

        public $libelle;

        public $dateAchat;

        public $photoProduit;

        public $idCategorie;

        function __construct($a, $c, $b, $d, $e, $f){
            $this->reference = $a;
            $this->prixUnitaire = $b;
            $this->libelle = $c;
            $this->dateAchat = $d;
            $this->photoProduit = $e;
            $this->idCategorie = $f;
        }
    }
   
?>