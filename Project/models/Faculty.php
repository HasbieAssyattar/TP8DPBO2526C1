<?php

class Faculty extends DB
{
    function getFaculties()
    {
        $query = "SELECT * FROM faculties ORDER BY id ASC";
        return $this->execute($query);
    }

    function getFacultyById($id)
    {
        $query = "SELECT * FROM faculties WHERE id = '$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        $code = $data['code'];
        $name = $data['name'];

        $query = "INSERT INTO faculties (code, name) VALUES ('$code', '$name')";
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $code = $data['code'];
        $name = $data['name'];

        $query = "UPDATE faculties SET code = '$code', name = '$name' WHERE id = '$id'";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM faculties WHERE id = '$id'";
        return $this->execute($query);
    }
}
