<?php

namespace Base;

use PDO;
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
    public $statement;

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
        $dsn = 'mysql:' . http_build_query($param,'',';');
        $pdo = new PDO($dsn,$this->user,$this->password,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        $this->conn = $pdo;
    }

    public function exec($query,$params = []) {
        $this->statement = $this->conn->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function find() {
        return $this->statement->fetch();
    }

    public function findOrAbort() {
        //A variável armazena as tuplas encontradas
        $result = $this->find();
        if(!$result) {
            $mensagem = "Nada encontrado!";
            abort(Response::NOT_FOUND,ROUTES,$mensagem);
        }
        return $result;
    }

    public function findAll() {
        return $this->statement->fetchAll();
    }
    public function findAllOrAbort() {
        $result = $this->findAll();

        if(!$result) {
            $mensagem = "Nada encontrado!";
            abort(Response::NOT_FOUND,ROUTES,$mensagem);
        }

        return $result;
    }

}
