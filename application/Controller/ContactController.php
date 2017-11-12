<?php

namespace Controller;

use Core\View;
use Model\Contact;

class ContactController
{
    private $model;
    private $view;
    
    public function __construct()
    {
        $this->model = new Contact();
        $this->view = new View();
    }
    
    public function findAll()
    {
        $data = $this->model->findAll();
        $this->view->setAttribute('applicationName', APPLICATION_NAME);
        $this->view->setAttribute('pageName', 'Contacts');
        $this->view->setAttribute('contacts', $data);
        $this->view->render('contact/findAll');
    }
    
    public function create()
    {
        $this->view->setAttribute('applicationName', APPLICATION_NAME);
        $this->view->setAttribute('pageName', 'Contacts');
        

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET')
        {
            $data = [
                'name' => '', 
                'mobileNumber' => '', 
                'address' => '', 
                'emailAddress' => ''
            ];
            $status = ['submitted' => false];
            $this->view->setAttribute('contact', $data);
            $this->view->setAttribute('status', $status);
            $this->view->render('contact/create');
        }
        
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $name = isset($_POST['name']) ? $_POST['name'] : NULL;
            $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : NULL;
            $address = isset($_POST['address']) ? $_POST['address'] : NULL;
            $emailAddress = isset($_POST['emailAddress']) ? $_POST['emailAddress'] : NULL;
            $dateCreated = date('Y-m-d H:i:s');

            $data = [
                'name' => $name, 
                'mobileNumber' => $mobileNumber, 
                'address' => $address, 
                'emailAddress' => $emailAddress, 
                'dateCreated' => $dateCreated
                ];
            
            if ($name != NULL && $mobileNumber != NULL && $address != NULL && $emailAddress != NULL) 
            {                
                if ($this->model->create($data) >= 1)
                {
                    $this->view->redirect('/contacts');
                }  
            }  
            else
            {
                $status = ['submitted' => true, 'message' => 'Please complete fields!'];
                $this->view->setAttribute('contact', $data);
                $this->view->setAttribute('status', $status);
                $this->view->render('contact/create');
            }        
        }
    }
    
    public function findById($id)
    {
        $data = $this->model->findById($id);
        $data = ['id' => $data['id'], 
            'name' => $data['name'], 
            'mobileNumber' => $data['mobile_no'],
            'address' => $data['address'],
            'emailAddress' => $data['email_address']
        ];

        $this->view->setAttribute('applicationName', APPLICATION_NAME);
        $this->view->setAttribute('pageName', 'Contacts');
        $this->view->setAttribute('contact', $data);
        $this->view->render('contact/findById');
    }
    
    public function update($id = '')
    {
        $this->view->setAttribute('applicationName', APPLICATION_NAME);
        $this->view->setAttribute('pageName', 'Contacts');

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET' && $id !== '')
        {
            $status = ['submitted' => false];
            $data = $this->model->findById($id);
            $data = ['id' => $data['id'], 
                'name' => $data['name'], 
                'mobileNumber' => $data['mobile_no'],
                'address' => $data['address'],
                'emailAddress' => $data['email_address']
            ];
            $this->view->setAttribute('contact', $data);
            $this->view->setAttribute('status', $status);
            $this->view->render('contact/update');
        }
        
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $id = isset($_POST['id']) ? $_POST['id'] : NULL;
            $name = isset($_POST['name']) ? $_POST['name'] : NULL;
            $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : NULL;
            $address = isset($_POST['address']) ? $_POST['address'] : NULL;
            $emailAddress = isset($_POST['emailAddress']) ? $_POST['emailAddress'] : NULL;
            $dateCreated = date('Y-m-d H:i:s');

            $data = [
                     'id' => $id,
                     'name' => $name, 
                     'mobileNumber' => $mobileNumber, 
                     'address' => $address, 
                     'emailAddress' => $emailAddress, 
                     'dateCreated' => $dateCreated
                    ];
            
            if ($name != NULL && $mobileNumber != NULL && $address != NULL && $emailAddress != NULL) {                    
                if ($this->model->update($data) >= 1)
                {
                    $this->view->redirect('/contacts');
                } else {
                    $this->view->redirect('/contacts');
                }
            }
            else
            {
                $status = ['submitted' => true, 'message' => 'Please complete fields!'];
                $this->view->setAttribute('contact', $data);
                $this->view->setAttribute('status', $status);
                $this->view->render('contact/update');
            } 
        }
    }
    
    public function delete($id)
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET' && $id !== '')
        {        
            if ($this->model->delete($id) >= 1)
            {
                $this->view->redirect('/contacts');   
            } else {
                $this->view->redirect('/contacts');
            }
        }
    }
}