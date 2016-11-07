<?php

/**
 * Created by PhpStorm.
 * User: weagl
 * Date: 05.09.2016
 * Time: 21:40
 */
class Login_Controller extends Controller
{
    function login_action(){
        $this->view->generate('login_view.php', 'template_view.php');
    }

    public function auth_action() {
        $model = new Login_Model();
        $contactsData = $model->getContacts();


        $this->view->generate('contacts_view.php', 'template_view.php', $contactsData);
    }
}