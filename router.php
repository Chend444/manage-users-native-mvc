<?php
class Router {
    public function route() {
        $request = $_SERVER['REQUEST_URI'];

        switch ($request) {
            case '/':
                require 'views/home.php';
                break;
            case '/users_table':
                require 'views/users_table.php';
                break;
            case '/user_form':
                require 'views/user_form.php';
                break;
            // Other routes as needed
            default:
                echo "404 Not Found";
                break;
        }
    }
}
?>
