<?php
//Classe para conexão e manipulação da base de dados
class Database {
    //Propriedades
    public $host;
    public $user;
    public $dbName;
    public $password;
    public $port;
    public $charset = "utf8mb4";
    public $conn;

    //Construct
    public function __construct($host,$user,$dbName,$port,$password) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbName = $dbName;
        $this->port = $port;
    }

    //Metodos
    public function connect(): void {
        $param = [
            "host" => $this->host,
            "dbname" => $this->dbName,
            "port" => $this->port,
            "charset" => $this->charset,
        ];

        //A função abaixo tem como objetivo construir a lista triade: propriedade:valor;
        $string = 'mysql:' . http_build_query($param,'',';');
        $pdo = new PDO($string,$this->user,$this->password,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        $this->conn = $pdo;
    }
    public function exec($query,$params = []) {
        $cmd = $this->conn->prepare($query);
        $cmd->execute($params);

        return($cmd);
    }
}
