<?php

namespace CRUD\Helper;

use CRUD\Model\Person;
use mysqli;

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
        echo $sql;
        $connect->execQuery($sql);
        echo "Success";
    }

    public function fetch(int $id)
    {
        $connect = new DBConnector($this->db, $this->server, $this->username, $this->password);
        $connect->connect();
        $sql = "SELECT * FROM person WHERE id = " . $id;
        $temp = $connect->execQuery($sql);
        echo json_encode($temp->fetchAll());


//        echo "First name: ".$person->getFirstName()." Last name: ".$person->getLastName()." Username: ".$person->getUsername();


    }

    public function fetchAll()
    {
        $connect = new DBConnector($this->db, $this->server, $this->username, $this->password);
        $sql = "SELECT * FROM person";


    }

    public function update($person)
    {
        $connect = new DBConnector($this->db, $this->server, $this->username, $this->password);

        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

//        $sql = "UPDATE person SET first_name = '$firstname', last_name = '$lastname' WHERE user_name = '$username'";

//        if ($connect->query($sql) === TRUE) {
//            echo "Record updated successfully";
//        } else {
//            echo "Error updating record: " . $connect->error;
//        }

        $connect->close();
    }

    public function delete($username)
    {

    }

}