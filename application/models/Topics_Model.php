<?php

/**
 * Created by PhpStorm.
 * User: weagl
 * Date: 06.09.2016
 * Time: 0:03
 */
class Topics_Model extends Model
{
    public function showAllByTopicId($id)
    {
        $sql = "SELECT Messages.text, Messages.created_at, Users.name FROM Messages, Users WHERE topic_id=" . $id . " AND Users.id = Messages.user_id";
        return Connection::makeQuery($sql);
//var_dump($rows);

    }
}