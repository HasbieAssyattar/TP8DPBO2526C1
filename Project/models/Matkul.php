<?php

class Matkul extends DB
{
    function getMatkul()
    {
        $query = "SELECT matkul.*, lecturers.name AS lecturer_name 
                  FROM matkul 
                  JOIN lecturers ON matkul.lecturer_id = lecturers.id 
                  ORDER BY matkul.id ASC";
        return $this->execute($query);
    }

    function getMatkulById($id)
    {
        $query = "SELECT * FROM matkul WHERE id = '$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        $code = $data['code'];
        $name = $data['name'];
        $sks = $data['sks'];
        $semester = $data['semester'];
        $lecturer_id = $data['lecturer_id'];

        $query = "INSERT INTO matkul (code, name, sks, semester, lecturer_id) 
                  VALUES ('$code', '$name', '$sks', '$semester', '$lecturer_id')";
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $code = $data['code'];
        $name = $data['name'];
        $sks = $data['sks'];
        $semester = $data['semester'];
        $lecturer_id = $data['lecturer_id'];

        $query = "UPDATE matkul 
                  SET code = '$code', name = '$name', sks = '$sks', semester = '$semester', lecturer_id = '$lecturer_id' 
                  WHERE id = '$id'";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM matkul WHERE id = '$id'";
        return $this->execute($query);
    }
}
