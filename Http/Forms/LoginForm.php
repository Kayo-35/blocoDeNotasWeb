<?php
namespace Http\Forms;

use Base\ValidationException;
use Base\Validator;

class LoginForm
{
    protected $erros = [];
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        if (!Validator::email($this->user->email)) {
            $this->erros["email"] = "Insira um email válido!";
        }
        if (!Validator::string($this->user->getPass(), 6, 255)) {
            $this->erros["password"] =
                "Insira uma senha com ao menos 6 caracteres!";
        }
        if (!is_null($this->user->name)) {
            if (!Validator::string($user->name, 5, 50)) {
                $this->erros["name"] =
                    "Insira um nome com ao menos 5 caracteres!";
            }
        }
        return $this;
    }

    public function throw()
    {
        ValidationException::throw($this->erros, $this->user->retrieve());
    }
    public function getErros()
    {
        return $this->erros;
    }

    public function validar()
    {
        if (!empty($this->erros)) {
            $this->throw();
        }
        return $this;
    }

    public function addError($field, $message)
    {
        $this->erros[$field] = $message;
        return $this;
    }
}
