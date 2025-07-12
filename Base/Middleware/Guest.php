<?php
namespace Base\Middleware;

class Guest
{
    public function handle()
    {
        if (isset($_SESSION["user"])) {
            redirect("/");
        }
    }
}
?>
