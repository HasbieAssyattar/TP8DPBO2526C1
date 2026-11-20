<?php

class FacultyView
{
    public function render($data, $editData = null)
    {
        $no = 1;
        $dataTabel = "";

        foreach ($data as $row) {
            $dataTabel .= "<tr>
                <td class='text-center align-middle'>" . $no++ . "</td>
                <td class='align-middle fw-bold'>" . htmlspecialchars($row['code']) . "</td>
                <td class='align-middle'>" . htmlspecialchars($row['name']) . "</td>
                <td class='text-center align-middle'>
                    <a href='faculties.php?id_edit=" . $row['id'] . "' class='btn btn-warning btn-sm me-1'>Edit</a>
                    <a href='faculties.php?id_hapus=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus fakultas ini?\")'>Hapus</a>
                </td>
            </tr>";
        }

        $tpl = new Template("templates/faculty.html");
        $tpl->replace("DATA_JUDUL", "Kelola Fakultas - SIAKAD DPBO");
        $tpl->replace("DATA_TABEL", $dataTabel);

        if ($editData != null) {
            $tpl->replace("DATA_FORM_TITLE", "Edit Fakultas");
            $tpl->replace("DATA_INPUT_ID", "<input type='hidden' name='id' value='" . $editData['id'] . "'>");
            $tpl->replace("DATA_VAL_CODE", htmlspecialchars($editData['code']));
            $tpl->replace("DATA_VAL_NAME", htmlspecialchars($editData['name']));
            $tpl->replace("DATA_BUTTON", "<button type='submit' name='edit' class='btn btn-warning'>Perbarui</button><a href='faculties.php' class='btn btn-outline-secondary'>Batal</a>");
        } else {
            $tpl->replace("DATA_FORM_TITLE", "Tambah Fakultas");
            $tpl->replace("DATA_INPUT_ID", "");
            $tpl->replace("DATA_VAL_CODE", "");
            $tpl->replace("DATA_VAL_NAME", "");
            $tpl->replace("DATA_BUTTON", "<button type='submit' name='add' class='btn btn-primary'>Simpan</button>");
        }

        $tpl->write();
    }
}
