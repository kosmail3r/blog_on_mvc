<?php
include_once 'application/core/Controller.php';

class Account_Controller extends Controller
{


    /**
     * Section_Controller constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->model = new Account_Model();
    }

    public function login_action()
    {
        if (!empty($_POST)) {
            $login = "";
            $password = "";

            if (!empty($_POST['login'])) {
                $login = mysqli_real_escape_string(Connection::$conn, $_POST['login']);
            }

            if (!empty($_POST['password'])) {
                $password = mysqli_real_escape_string(Connection::$conn, $_POST['password']);
            }
            $t = $this->model->checkAuth($login, $password);
            //var_dump($t);
            if (!(empty($t))) {

                $_SESSION ['isAuthenticated'] = $t[0]['id'];
                header('Location:../../section/index');
            } else {

                $this->view->generate('header_view.php', 'login_view.php', 'template_view.php' ,false );
            }
            // header('Location:index.php');
        } else {
            $this->view->generate('header_view.php', 'login_view.php', 'template_view.php');
        }

    }

    public function registration_action()
    {
        if (!empty($_POST)) {
            $login = "";
            $password = "";
            $password2 = "";
            $email = "";
            $name = "";


            if (!empty($_POST['login'])) {
                $login = mysqli_real_escape_string(Connection::$conn, $_POST['login']);
            }

            if (!empty($_POST['password'])) {
                $password = mysqli_real_escape_string(Connection::$conn, $_POST['password']);
            }

            if (!empty($_POST['password2'])) {
                $password2 = mysqli_real_escape_string(Connection::$conn, $_POST['password2']);
            }

            if (!empty($_POST['email'])) {
                $email = mysqli_real_escape_string(Connection::$conn, $_POST['email']);
            }
            if (!empty($_POST['name'])) {
                $name = mysqli_real_escape_string(Connection::$conn, $_POST['name']);
            }

            if ($password === $password2) {
                $this->model->register($login, $password, $name, $email);
                $_SESSION ['isAuthenticated'] = true;
                header ("location: ../../section/index");
            }


        } else {
            $this->view->generate('header_view.php', 'registration_view.php', 'template_view.php');
        }
    }
    public function logout_action(){
                   unset ($_SESSION['isAuthenticated']);
       header ("location: ../../section/index");
    }
}



