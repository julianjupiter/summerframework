<?php

namespace Model;

use Core\Model;
use \PDO;

class Contact extends Model
{
        
    public function __construct()
    {
        parent::__construct();
    }
    
    public function findAll()
    {
        $sql = 'SELECT * FROM contact';
        $statement = $this->db->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findById($id)
    {
        $sql = 'SELECT * FROM contact WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->execute([':id' => $id]);
        return $statement->fetch();
    }
    
    public function create($data)
    {
        $sql = 'INSERT INTO contact(name, mobile_no, address, email_address, date_created) 
                VALUES(:name, :mobile_no, :address, :email_address, :date_created)';
        $statement = $this->db->prepare($sql);
        $statement->execute([':name' => $data['name'], ':mobile_no' => $data['mobileNumber'], ':address' => $data['address'], 
                ':email_address' => $data['emailAddress'], ':date_created' => $data['dateCreated']]);                
        return $this->db->lastInsertId();
    }
    
    public function update($data)
    {
        $sql = 'UPDATE contact SET name = :name, mobile_no = :mobile_no, address = :address, email_address = :email_address
                WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->execute([':name' => $data['name'], ':mobile_no' => $data['mobileNumber'], ':address' => $data['address'], 
                ':email_address' => $data['emailAddress'], ':id' => $data['id']]);
        return $statement->rowCount();
    }
    
    public function delete($id)
    {
        $sql = 'DELETE FROM contact WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->execute([':id' => $id]);
        return $statement->rowCount();
    }
}