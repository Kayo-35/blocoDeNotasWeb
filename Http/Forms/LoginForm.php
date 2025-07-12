<?php
namespace Http\Forms;
use Base\Validator;

class LoginForm
{
    protected $erros = [];

    public function validar($atributos)
    {
        if (!Validator::email($atributos["email"])) {
            $this->erros["email"] = "Insira um email válido!";
        }
        if (!Validator::string($atributos["password"])) {
            $this->erros["password"] =
                "Insira uma senha com ao menos 7 caracteres!";
        }
        if (array_key_exists("nome", $atributos)) {
            if (!Validator::string($atributos["nome"], 5, 50)) {
            }
        }
        return empty($this->erros);
    }

    public function getErros()
    {
        return $this->erros;
    }
}
