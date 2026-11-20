<?php

class LecturerView
{
    public function render($data, $editData = null)
    {
        $no = 1;
        $dataTabel = "";
        $dataOption = "";

        foreach ($data['faculties'] as $fac) {
            $selected = ($editData != null && $editData['faculty_id'] == $fac['id']) ? "selected" : "";
            $dataOption .= "<option value='" . $fac['id'] . "' $selected>" . htmlspecialchars($fac['code'] . " - " . $fac['name']) . "</option>";
        }

        foreach ($data['lecturers'] as $row) {
            $dataTabel .= "<tr>
                <td class='text-center align-middle'>" . $no++ . "</td>
                <td class='align-middle fw-bold'>" . htmlspecialchars($row['name']) . "</td>
                <td class='align-middle'>" . htmlspecialchars($row['nidn']) . "</td>
                <td class='align-middle'>" . htmlspecialchars($row['phone']) . "</td>
                <td class='align-middle'>" . htmlspecialchars($row['join_date']) . "</td>
                <td class='align-middle'><span class='badge bg-secondary me-1'>" . htmlspecialchars($row['faculty_code']) . "</span>" . htmlspecialchars($row['faculty_name']) . "</td>
                <td class='text-center align-middle'>
                    <a href='lecturers.php?id_edit=" . $row['id'] . "' class='btn btn-warning btn-sm me-1'>Edit</a>
                    <a href='lecturers.php?id_hapus=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus dosen ini?\")'>Hapus</a>
                </td>
            </tr>";
        }

        $tpl = new Template("templates/lecturer.html");
        $tpl->replace("DATA_JUDUL", "Kelola Dosen - SIAKAD DPBO");
        $tpl->replace("DATA_TABEL", $dataTabel);
        $tpl->replace("DATA_OPTION", $dataOption);

        if ($editData != null) {
            $tpl->replace("DATA_FORM_TITLE", "Edit Dosen");
            $tpl->replace("DATA_INPUT_ID", "<input type='hidden' name='id' value='" . $editData['id'] . "'>");
            $tpl->replace("DATA_VAL_NAME", htmlspecialchars($editData['name']));
            $tpl->replace("DATA_VAL_NIDN", htmlspecialchars($editData['nidn']));
            $tpl->replace("DATA_VAL_PHONE", htmlspecialchars($editData['phone']));
            $tpl->replace("DATA_VAL_DATE", htmlspecialchars($editData['join_date']));
            $tpl->replace("DATA_BUTTON", "<button type='submit' name='edit' class='btn btn-warning'>Perbarui</button><a href='lecturers.php' class='btn btn-outline-secondary'>Batal</a>");
        } else {
            $tpl->replace("DATA_FORM_TITLE", "Tambah Dosen");
            $tpl->replace("DATA_INPUT_ID", "");
            $tpl->replace("DATA_VAL_NAME", "");
            $tpl->replace("DATA_VAL_NIDN", "");
            $tpl->replace("DATA_VAL_PHONE", "");
            $tpl->replace("DATA_VAL_DATE", "");
            $tpl->replace("DATA_BUTTON", "<button type='submit' name='add' class='btn btn-primary'>Simpan</button>");
        }

        $tpl->write();
    }
}
