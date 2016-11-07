<?php
	class Sections_Controller extends Controller {
		public function index_action() {
			$sql = "SELECT * FROM section";
			$result = Connection::makeQuery($sql);
	        $this->view->generate('list_of_sections_view.php', 'template_view.php', $result);
    	}

    	public function topics_action($id) {
			$sql = "SELECT * FROM topics WHERE section_id = " . $id;
			$result = Connection::makeQuery($sql);
			$this->view->generate('list_of_topics_view.php', 'template_view.php', $result);
    	}

    	public function message_action($id) {
            $sql = "SELECT * FROM Messages WHERE topic_id=" . $id;
            $result = Connection::makeQuery($sql);
            $this->view->generate('list_of_messages_view.php', 'template_view.php', $result);
        }
	}