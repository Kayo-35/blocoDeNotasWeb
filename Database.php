<?php
//Classe para conexão e manipulação da base de dados
class Database {
    //Propriedades
    public $dsn;
    public $user;
    public $password;
    public $conn;

    //Construct
    public function __construct($dsn,$user,$password) {
        $this->dsn = $dsn;
        $this->user = $user;
        $this->password = $password;
    }

    //Metodos
    public function connect(): void {
        $pdo = new PDO($this->dsn,$this->user,$this->password);
        $this->conn = $pdo;
    }
    public function exec($query) {
        $cmd = $this->conn->prepare($query);
        $cmd->execute();

        return($cmd);
    }
}
