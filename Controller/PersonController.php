<?php

namespace CRUD\Controller;

use CRUD\Helper\PersonHelper;
use CRUD\Model\Actions;
use CRUD\Model\Person;

class PersonController
{
    public function switcher($uri,$request)
    {
        switch ($uri)
        {
            case Actions::CREATE:
                $this->createAction($request);
                break;
            case Actions::UPDATE:
                $this->updateAction($request);
                break;
            case Actions::READ:
                $this->readAction($request);
                break;
            case Actions::READ_ALL:
                $this->readAllAction($request);
                break;
            case Actions::DELETE:
                $this->deleteAction($request);
                break;
            default:
                break;
        }
    }

    public function createAction($request)
    {
        $helper = new PersonHelper();
        $person = new Person();
        $person->setFirstName($request["firstName"]);
        $person->setLastName($request["lastName"]);
        $person->setUsername($request["username"]);
        $helper->insert($person);
    }

    public function updateAction($request)
    {
        $helper = new PersonHelper();
        $person = new Person();
        $person->setFirstName($request["firstName"]);
        $person->setLastName($request["lastName"]);
        $person->setUsername($request["username"]);
        $helper->update($person);
    }

    public function readAction($request)
    {
        $helper = new PersonHelper();
        $helper->fetch($request['id']);
    }

    public function readAllAction($request)
    {
        $helper = new PersonHelper();
        $helper->fetchAll();
    }

    public function deleteAction($request)
    {
        $helper = new PersonHelper();
        $helper->delete($request['username']);
    }

}