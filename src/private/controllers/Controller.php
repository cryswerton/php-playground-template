<?php

require_once __DIR__ . '/../models/Link.php';

class Controller {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    private function renderHomePage($message = null) {
        $link = new Link($this->pdo);
        $links = $link->getAll();
        view('index', [
            'links' => $links,
            'message' => $message
        ]);
    }   

    public function index() 
    {
        $this->renderHomePage();
    }

    public function add()
    {
        view('add');
    }

    public function create()
    {
        // check the POST url from the request
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['url'])) {
        $url = $_POST['url'];
        // validate the URL
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            $this->renderHomePage('Invalid URL.');
            return;
        }

        $link = new Link($this->pdo);

        // execute the statement
        if ($link->create($url)) {
            header('Location: /');
            exit;
        } else {
            echo "Failed to create link.";
        }
        } else {
            echo "Invalid request.";
            exit;
        }   
    }

    public function update()
    {
        // check if the request is a POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['url'])) {
            $linkId = $_POST['id'];
            $url = $_POST['url'];

            // validate the URL
            if (filter_var($url, FILTER_VALIDATE_URL) === false) {
                echo "Invalid URL.";
                exit;
            }

            $link = new Link($this->pdo);;

            // execute the statement
            if ($link->update($linkId, $url)) {
                $this->renderHomePage();
            } else {
                echo "Failed to update link.";
            }
        } else {
            echo "Invalid request.";
            exit;
        }
    }

    public function edit($id) 
    {
        if ($id === null) {
            echo "No link ID provided.";
            exit;
        }

        $link = new Link($this->pdo);
        $editedLink = $link->getById($id);

        if (!$editedLink) {
            echo "Link not found.";
            exit;
        }    

        view('edit', ['link' => $editedLink]);
    }

    function delete()
    {
        if (!isset($_GET['id'])) {
            echo "No link ID provided.";
            exit;
        }

        // get the link ID from the query parameters
        $linkId = $_GET['id'];

        $link = new Link($this->pdo);

        // execute the statement
        if ($link->delete($linkId)) {
            $this->renderHomePage();
        } else {
            echo "Failed to delete link.";
        }
    }
}