<?php
namespace Http\Forms;
use Base\App;
use Base\Database;

class User
{
    public ?string $name;
    public string $email;
    protected int $userCode;
    protected string $password;
    protected Database $db;

    public function setup()
    {
        $this->name = $_POST["name"] ?? null;
        $this->email = $_POST["email"];
        $this->setPass($_POST["password"]);
    }
    public function setPass($password)
    {
        $this->password = $password;
    }
    public function getPass()
    {
        return $this->password;
    }
    public function setUserCode()
    {
        $this->connect();
        $this->userCode = $this->db
            ->exec("SELECT id_user FROM usuario WHERE email = :email", [
                "email" => $this->email,
            ])
            ->find()["id_user"];
    }
    public function getCode()
    {
        return $this->userCode;
    }
    public function connect()
    {
        $this->db = App::resolve(Database::class);
        $this->db->connect();
    }
    public function search()
    {
        $this->connect();
        $user = $this->db
            ->exec("SELECT * FROM usuario WHERE email = :email;", [
                "email" => $this->email,
            ])
            ->find();
        return $user;
    }
    public function register(User $user)
    {
        $this->connect();
        $this->db->exec(
            "INSERT INTO usuario(name,email,password) VALUES (:name,:email,:password);",
            [
                "name" => $user->name,
                "email" => $user->email,
                "password" => password_hash($user->getPass(), PASSWORD_BCRYPT),
            ]
        );
    }
}
?>
