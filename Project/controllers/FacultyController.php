<?php
include_once("config.php");
include_once("models/DB.php");
include_once("models/Faculty.php");
include_once("views/Template.php");
include_once("views/FacultyView.php");

class FacultyController
{
    private $faculty;

    function __construct()
    {
        $this->faculty = new Faculty(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    }

    public function index($id_edit = null)
    {
        $this->faculty->open();
        $this->faculty->getFaculties();

        $data = array();
        while ($row = $this->faculty->getResult()) {
            array_push($data, $row);
        }

        $editData = null;
        if ($id_edit != null) {
            $this->faculty->getFacultyById($id_edit);
            $editData = $this->faculty->getResult();
        }

        $this->faculty->close();

        $view = new FacultyView();
        $view->render($data, $editData);
    }

    public function add($data)
    {
        $this->faculty->open();
        $this->faculty->add($data);
        $this->faculty->close();
        header("location: faculties.php");
    }

    public function edit($id, $data)
    {
        $this->faculty->open();
        $this->faculty->update($id, $data);
        $this->faculty->close();
        header("location: faculties.php");
    }

    public function delete($id)
    {
        $this->faculty->open();
        $this->faculty->delete($id);
        $this->faculty->close();
        header("location: faculties.php");
    }
}
