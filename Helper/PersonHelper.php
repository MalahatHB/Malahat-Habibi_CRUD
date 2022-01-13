<?php

namespace CRUD\Helper;

use CRUD\Model\Person;

class PersonHelper
{
    private $db = "person_crud";
    private $server = "localhost";
    private $username = "root";
    private $password = "1234";

    /**
     * @param Person $person
     */
    public function insert($person)
    {
        $connect = new DBConnector($this->db, $this->server, $this->username, $this->password);
        $connect->connect();
        $sql = "INSERT INTO person (first_name, last_name, user_name) VALUES ('".$person->getFirstName()."', '".$person->getLastName()."', '".$person->getUsername()."')";
//        echo $sql;
        $connect->execQuery($sql);
        if ($connect){
            echo "Insert was successful!";
        } else{
            echo "Insert was not successful!";
        }

    }

    public function fetch(int $id)
    {
        $connect = new DBConnector($this->db, $this->server, $this->username, $this->password);
        $connect->connect();
        $sql = "SELECT * FROM person WHERE id = " . $id;
        $temp = $connect->execQuery($sql);
        $data = json_encode($temp->fetchAll());
        if ($data){
            echo $data;
        } else{
            echo "The user was not found!";
        }
    }

    public function fetchAll()
    {
        $connect = new DBConnector($this->db, $this->server, $this->username, $this->password);
        $connect->connect();
        $sql = "SELECT * FROM person";
        $temp = $connect->execQuery($sql);
        $data = json_encode($temp->fetchAll());
        if ($data){
            echo $data;
        } else{
            echo "No users found!";
        }
    }

    public function update($person)
    {
        $connect = new DBConnector($this->db, $this->server, $this->username, $this->password);
        $connect->connect();
        $sql = "UPDATE person SET first_name = '".$person->getFirstName()."', last_name = '".$person->getLastName()."' WHERE user_name = '".$person->getUsername()."'";
        $connect->execQuery($sql);
        if ($connect){
            echo "Update was successful!";
        } else{
            echo "Update was not successful!";
        }
    }

    public function delete($username)
    {
        $connect = new DBConnector($this->db, $this->server, $this->username, $this->password);
        $connect->connect();
        $sql = "DELETE FROM person WHERE user_name = '$username'";
        $connect->execQuery($sql);
        if ($connect){
            echo "User deleted successfully!";
        } else{
            echo "Delete was not successful!";
        }
    }

}