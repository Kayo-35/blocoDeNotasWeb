<?php
namespace Base\Middleware;

class Logged
{
    public function handle()
    {
        if (!isset($_SESSION["user"])) {
            redirect("/");
        }
    }
}
?>
