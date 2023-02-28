<?php
    class Categorie
    {
        public $id;
        public $denomination;

        public $description;

        function __construct($a, $b, $c){
            $this->id = $a;
            $this->denomination = $b;
            $this->description = $c;
        }
    }
   
?>