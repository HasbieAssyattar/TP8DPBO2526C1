<?php
include_once("controllers/FacultyController.php");

$controller = new FacultyController();

if (isset($_POST['add'])) {
    $controller->add($_POST);
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $controller->edit($id, $_POST);
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $controller->delete($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $controller->index($id);
} else {
    $controller->index();
}
