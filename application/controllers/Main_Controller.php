<?php

class Main_Controller extends Controller{

    public function index_action() {

        $this->view->generate('main_view.php', 'template_view.php');
    }

    public function contacts_action() {
    	$model = new Main_Model();
    	$contactsData = $model->getContacts();


    	$this->view->generate('contacts_view.php', 'template_view.php', $contactsData);
    }
}