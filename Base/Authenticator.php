<?php
namespace Base;
use Http\Forms\User;
use Base\Session;

class Authenticator
{
    public function attempt(User $user)
    {
        $result = $user->search($user->email);
        if (
            isset($result["id_user"]) &&
            password_verify($_POST["password"], $result["password"])
        ) {
            $this->login($user);
            redirect("/notas");
        }
        return false;
    }

    public function login(User $user)
    {
        is_null($user->name) ? $user->searchName() : false;
        $user->setUserCode();
        $_SESSION["user"] = [
            "name" => $user->name,
            "email" => $user->email,
            "userCode" => $user->getCode(),
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
