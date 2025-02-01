<?php

    // connects to database same code as used in lesson
    
    class database { // main database class
        private $host     = 'localhost'; // private variables are only accessible in the class they are defined in

        private $username = 'root';

        private $password = 'mysql'; // for ammps use mysql;

        private $database = 'assignment1Stallard';

        protected $connection; // protected variables are accesisble in the class they are defined in as well as any sub classes
        public function __construct() {
            if (!isset($this->connection)) {
                $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

                if(!$this->connection) {
                    echo "<p>Cannot connect to the database</p>";
                    exit();
                }
            }

            return $this->connection;
        }
    }

?>

