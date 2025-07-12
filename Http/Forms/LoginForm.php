<?php
namespace Http\Forms;
use Base\Validator;

class LoginForm
{
    protected $erros = [];

    public function getErros()
    {
        return $this->erros;
    }

    public function validar(User $user)
    {
        if (!Validator::email($user->email)) {
            $this->erros["email"] = "Insira um email válido!";
        }
        if (!Validator::string($user->getPass(), 6, 255)) {
            $this->erros["password"] =
                "Insira uma senha com ao menos 6 caracteres!";
        }
        if (!is_null($user->name)) {
            if (!Validator::string($user->name, 5, 50)) {
                $this->erros["name"] =
                    "Insira um nome com ao menos 5 caracteres!";
            }
        }
        return empty($this->erros);
    }

    public function addError($field, $message)
    {
        $this->erros[$field] = $message;
    }
}
