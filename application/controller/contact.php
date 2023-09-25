<?php



class Contact extends Controller {

    public function create(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/contatos/criar.php';
        require APP . 'view/_templates/footer.php';
    }

    public function createContact(){
        $name = $_POST['name'];
        $cellphone = $_POST['cellphone'];

        $this->model->createContact($name, $cellphone);
        header('location: ' . URL . '/contact/list');
    }

    public function list(){

        $listOfContacts = $this->model->getContacts();

        require APP . 'view/_templates/header.php';
        require APP . 'view/contatos/list.php';
        require APP . 'view/_templates/footer.php';
    }

    public function edit(){
        $id = basename($_GET['url']);
        $contact = $this->model->getContactById($id);

        require APP . 'view/_templates/header.php';
        require APP . 'view/contatos/criar.php';
        require APP . 'view/_templates/footer.php';
    }

    public function saveContact(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $cellphone = $_POST['cellphone'];

        $this->model->saveContact($id, $name, $cellphone);
        header('location: ' . URL . 'contact/list');
    }

    public function deleteContacById(){
        $id = basename($_GET['url']);
        $this->model->deleteContactById($id);
        header('location: ' . URL . 'contact/list');
    }
}
?>
