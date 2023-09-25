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
    public function createContact(string $name, string $cellphone){
        $parameters= [];
        $parameters['name'] = strtoupper($name);
        $parameters['cellphone'] = $cellphone;

        $sql= "INSERT
                INTO contacts
                    (name, cellphone)
                VALUES( :name, :cellphone);";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
    }

    public function getContacts(){
        $sql="SELECT * FROM contacts";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getContactById(int $id){
        $parameters = [];
        $parameters["id"] = $id;
        $sql = "SELECT * FROM contacts where id=:id";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function saveContact(int $id, string $name, string $cellphone){
        $parameters = [];
        $parameters["id"] = $id;
        $parameters["name"] = strtoupper($name);
        $parameters["cellphone"] = $cellphone;

        $sql = "UPDATE contacts
                    SET
                    name=:name,
                    cellphone=:cellphone
                    WHERE id=:id;";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
    }

    public function deleteContactById(int $id){
        $parameters = [];
        $parameters["id"] = $id;

        $sql = "DELETE FROM contacts WHERE id=:id;";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
    }
}
