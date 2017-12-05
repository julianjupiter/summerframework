<?php

namespace Controller;

use Core\Controller;
use Model\Contact;
use Helper\Input;

class ContactController extends Controller
{    
    private $input;

    public function __construct()
    {
        parent::__construct(new Contact());
        $this->input = new Input();
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

        if ($this->request->isHttpMethod() && $this->request->isHttpGetMethod())
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
        
        if ($this->request->isHttpMethod() && $this->request->isHttpPostMethod()) 
        {
            $name = $this->input->post('name');
            $mobileNumber = $this->input->post('mobileNumber');
            $address = $this->input->post('address');
            $emailAddress = $this->input->post('emailAddress');
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

        if ($this->request->isHttpMethod() && $this->request->isHttpGetMethod() && $id !== '')
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
        
        if ($this->request->isHttpMethod() && $this->request->isHttpPostMethod())
        {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $mobileNumber = $this->input->post('mobileNumber');
            $address = $this->input->post('address');
            $emailAddress = $this->input->post('emailAddress');
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
                }
                else
                {
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
        if ($this->request->isHttpMethod() && $this->request->isHttpGetMethod() && $id !== '')
        {        
            if ($this->model->delete($id) >= 1)
            {
                $this->view->redirect('/contacts');   
            } 
            else 
            {
                $this->view->redirect('/contacts');
            }
        }
    }
}