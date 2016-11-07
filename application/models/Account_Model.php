<?php
class Account_Model extends Model
{
    public $name;
    public $login;
    public $password;
    public $email;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function hashPassword($password)
    {
        $result = hash('sha512', $password); // <-- TODO: hash password here. md5 is not a very good idea
        return $result;
    }

    public function checkAuth($login, $password)
    {
        $sql = "SELECT id FROM Users WHERE login='" . $login . "' AND password='" . self::hashPassword($password) . "'";
        return Connection::makeQuery($sql, true);
    }

    public function register($login, $password, $name, $email)
    {

        $sql = "INSERT INTO Users(login , password, name, email) VALUES ('{$login}' , '" . self::hashPassword($password) . "' , '{$name}' , '{$email}');";

        return Connection::makeQuery($sql, false);

    }

    public function GetUserByID($id)
    {
        $sql = "SELECT * FROM Users WHERE id=$id";
        $result = Connection::makeQuery($sql, true);

        $user = new Users($result[0]['name'], $result[0]['login'], $result[0]['password'], $result[0]['email']);
        return $user;
    }

    public function UpdateUserName($name, $id)
    {
        $sql = "UPDATE Users set name=$name WHERE id=$id ";
        $result = Connection::makeQuery($sql, false);
    }

    public function UpdateUserPassword($password, $id)
    {
        $sql = "UPDATE Users set password='" . self::hashPassword($password) . "' WHERE id=$id ";
        $result = Connection::makeQuery($sql, false);
    }


}