<?php
include_once("config.php");
include_once("models/DB.php");
include_once("models/Lecturer.php");
include_once("models/Faculty.php");
include_once("views/Template.php");
include_once("views/LecturerView.php");

class LecturerController
{
    private $lecturer;
    private $faculty;

    function __construct()
    {
        $this->lecturer = new Lecturer(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
        $this->faculty = new Faculty(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    }

    public function index($id_edit = null)
    {
        $this->lecturer->open();
        $this->faculty->open();

        $this->lecturer->getLecturers();
        $this->faculty->getFaculties();

        $data = array(
            'lecturers' => array(),
            'faculties' => array()
        );

        while ($row = $this->lecturer->getResult()) {
            array_push($data['lecturers'], $row);
        }

        while ($row = $this->faculty->getResult()) {
            array_push($data['faculties'], $row);
        }

        $editData = null;
        if ($id_edit != null) {
            $this->lecturer->getLecturerById($id_edit);
            $editData = $this->lecturer->getResult();
        }

        $this->lecturer->close();
        $this->faculty->close();

        $view = new LecturerView();
        $view->render($data, $editData);
    }

    public function add($data)
    {
        $this->lecturer->open();
        $this->lecturer->add($data);
        $this->lecturer->close();
        header("location: lecturers.php");
    }

    public function edit($id, $data)
    {
        $this->lecturer->open();
        $this->lecturer->update($id, $data);
        $this->lecturer->close();
        header("location: lecturers.php");
    }

    public function delete($id)
    {
        $this->lecturer->open();
        $this->lecturer->delete($id);
        $this->lecturer->close();
        header("location: lecturers.php");
    }
}
