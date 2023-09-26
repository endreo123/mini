<?php
class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all songs from database
     */
    public function createContact($name, $cellphone, $email){
        $parameters= [];
        $parameters['name'] = strtoupper($name);
        $parameters['cellphone'] = $cellphone;
        $parameters['email'] = $email;

        $sql= "INSERT
                INTO contacts
                    (name, cellphone, email)
                VALUES( :name, :cellphone, :email);";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
    }

    public function getContacts(){
        $sql="SELECT * FROM contacts";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getContactById($id){
        $parameters = [];
        $parameters["id"] = $id;
        $sql = "SELECT * FROM contacts where id=:id";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function saveContact($id, $name, $cellphone, $email){
        $parameters = [];
        $parameters["id"] = $id;
        $parameters["name"] = strtoupper($name);
        $parameters["cellphone"] = $cellphone;
        $parameters["email"] = $email;

        $sql = "UPDATE contacts
                    SET
                    name= :name,
                    cellphone= :cellphone,
                    email= :email
                    WHERE id=:id;";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
    }

    public function deleteContactById($id){
        $parameters = [];
        $parameters["id"] = $id;

        $sql = "DELETE FROM contacts WHERE id=:id;";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
    }
}
