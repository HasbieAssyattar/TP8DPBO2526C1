<?php

class Lecturer extends DB
{
    function getLecturers()
    {
        $query = "SELECT lecturers.*, faculties.name AS faculty_name, faculties.code AS faculty_code 
                  FROM lecturers 
                  JOIN faculties ON lecturers.faculty_id = faculties.id 
                  ORDER BY lecturers.id ASC";
        return $this->execute($query);
    }

    function getLecturerById($id)
    {
        $query = "SELECT * FROM lecturers WHERE id = '$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $nidn = $data['nidn'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $faculty_id = $data['faculty_id'];

        $query = "INSERT INTO lecturers (name, nidn, phone, join_date, faculty_id) 
                  VALUES ('$name', '$nidn', '$phone', '$join_date', '$faculty_id')";
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $name = $data['name'];
        $nidn = $data['nidn'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $faculty_id = $data['faculty_id'];

        $query = "UPDATE lecturers 
                  SET name = '$name', nidn = '$nidn', phone = '$phone', join_date = '$join_date', faculty_id = '$faculty_id' 
                  WHERE id = '$id'";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM lecturers WHERE id = '$id'";
        return $this->execute($query);
    }
}
