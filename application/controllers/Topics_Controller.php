<?php

/**
 * Created by PhpStorm.
 * User: weagl
 * Date: 05.09.2016
 * Time: 22:50
 */
class Topics_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->model = new Topics_Model();
    }

    public function getId($id)
    {
        $sql = "SELECT * FROM Topics WHERE id=" . $id;
        return  Connection::makeQuery($sql)[0];
    }

    public function index_action($id)
    {
        //$rows = $this->model->showAllByTopicId($id);
        //$section_id = $this->getId($id)['section_id'];
       // $data = array('id' => $id, 'sectionId' => $section_id, 'rows' => $rows);
        $sql = "SELECT Messages.text, Messages.created_at, Users.name FROM Messages, Users WHERE topic_id=" . $id . " AND Users.id = Messages.user_id";
        $result = Connection::makeQuery($sql);
        $this->view->generate('list_of_messages_view.php', 'template_view.php', $result);
    }
}