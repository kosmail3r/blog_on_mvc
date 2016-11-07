<?php
	class Connection {
		static public $conn;
		const DB_HOST = 'localhost';
		const DB_NAME = 'forum';
		const DB_USER = 'root';
		const DB_PASSWORD = '';

		static public function connect() {	
			self::$conn = mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME);
			if (!self::$conn) {
				die ('Oops something happened');
			}
		}

		static public function makeQuery($sql, $isResultNeed = true) {
			$r = mysqli_query(self::$conn, $sql);
			if (!$isResultNeed) {
				return (is_bool($r) ? $r : mysqli_num_rows($r) > 0);
			}

			$result = [];
			while ($row = mysqli_fetch_assoc($r)) {
				$result[] = $row;
			}

			return $result;
		}
		//для сообщений

        static public function getTopicName($id)
        {
            $sql = "SELECT name FROM Topics WHERE id='" . $id . "'";
            $rows = self::makeQuery($sql);
            $result = array_shift($rows);
            return $result;
        }

        static public function showAllByTopicId($id )
        {
            $sql = "SELECT * FROM Messages WHERE topic_id='" . $id . "'";
            $rows = Connection::makeQuery($sql);

            foreach ($rows as $row) {
                echo "<p>";
                echo "<p>Сообщение в теме <strong>" . Messages::getTopicName($id) . "</strong>  от пользователя <strong>" . Users::getUserNameById($row['user_id']) . "</strong></a></p>";
                echo "<p>" . $row['text'] . "</p>";
                echo "</p>";
            }
        }

        static public function NewMsg($userId, $topicId, $text)
        {
            $sql = "INSERT INTO Messages (user_id, created_at, topic_id, text) VALUES ('" . $userId . "', NOW(),'" . $topicId . "','" . $text . "')";
            $result = self::makeQuery($sql);
            if ($result){
                return true;
            } else {
                return false;
            }
        }
// для юзера
    static public function getUserNameById($userID)
    {
        $sql = "SELECT name FROM Users WHERE id='" . $userID . "'";
        $rows = self::makeQuery($sql);
        $result = array_shift($rows);
        return $result;
    }
    }