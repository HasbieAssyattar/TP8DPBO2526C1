<?php
include_once("config.php");
include_once("models/DB.php");
include_once("models/Matkul.php");
include_once("models/Lecturer.php");
include_once("views/Template.php");
include_once("views/MatkulView.php");

class MatkulController
{
    private $matkul;
    private $lecturer;

    function __construct()
    {
        $this->matkul = new Matkul(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
        $this->lecturer = new Lecturer(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    }

    public function index($id_edit = null)
    {
        $this->matkul->open();
        $this->lecturer->open();

        $this->matkul->getMatkul();
        $this->lecturer->getLecturers();

        $data = array(
            'matkul' => array(),
            'lecturers' => array()
        );

        while ($row = $this->matkul->getResult()) {
            array_push($data['matkul'], $row);
        }

        while ($row = $this->lecturer->getResult()) {
            array_push($data['lecturers'], $row);
        }

        $editData = null;
        if ($id_edit != null) {
            $this->matkul->getMatkulById($id_edit);
            $editData = $this->matkul->getResult();
        }

        $this->matkul->close();
        $this->lecturer->close();

        $view = new MatkulView();
        $view->render($data, $editData);
    }

    public function add($data)
    {
        $this->matkul->open();
        $this->matkul->add($data);
        $this->matkul->close();
        header("location: matkul.php");
    }

    public function edit($id, $data)
    {
        $this->matkul->open();
        $this->matkul->update($id, $data);
        $this->matkul->close();
        header("location: matkul.php");
    }

    public function delete($id)
    {
        $this->matkul->open();
        $this->matkul->delete($id);
        $this->matkul->close();
        header("location: matkul.php");
    }
}
