<?php

class MatkulView
{
    public function render($data, $editData = null)
    {
        $no = 1;
        $dataTabel = "";
        $dataOption = "";

        foreach ($data['lecturers'] as $lec) {
            $selected = ($editData != null && $editData['lecturer_id'] == $lec['id']) ? "selected" : "";
            $dataOption .= "<option value='" . $lec['id'] . "' $selected>" . htmlspecialchars($lec['name']) . "</option>";
        }

        foreach ($data['matkul'] as $row) {
            $dataTabel .= "<tr>
                <td class='text-center align-middle'>" . $no++ . "</td>
                <td class='align-middle fw-bold'>" . htmlspecialchars($row['code']) . "</td>
                <td class='align-middle'>" . htmlspecialchars($row['name']) . "</td>
                <td class='text-center align-middle'><span class='badge bg-info text-dark'>" . htmlspecialchars($row['sks']) . " SKS</span></td>
                <td class='text-center align-middle'>" . htmlspecialchars($row['semester']) . "</td>
                <td class='align-middle'>" . htmlspecialchars($row['lecturer_name']) . "</td>
                <td class='text-center align-middle'>
                    <a href='matkul.php?id_edit=" . $row['id'] . "' class='btn btn-warning btn-sm me-1'>Edit</a>
                    <a href='matkul.php?id_hapus=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus mata kuliah ini?\")'>Hapus</a>
                </td>
            </tr>";
        }

        $tpl = new Template("templates/matkul.html");
        $tpl->replace("DATA_JUDUL", "Kelola Mata Kuliah - SIAKAD DPBO");
        $tpl->replace("DATA_TABEL", $dataTabel);
        $tpl->replace("DATA_OPTION", $dataOption);

        if ($editData != null) {
            $tpl->replace("DATA_FORM_TITLE", "Edit Mata Kuliah");
            $tpl->replace("DATA_INPUT_ID", "<input type='hidden' name='id' value='" . $editData['id'] . "'>");
            $tpl->replace("DATA_VAL_CODE", htmlspecialchars($editData['code']));
            $tpl->replace("DATA_VAL_NAME", htmlspecialchars($editData['name']));
            $tpl->replace("DATA_VAL_SKS", htmlspecialchars($editData['sks']));
            $tpl->replace("DATA_VAL_SEMESTER", htmlspecialchars($editData['semester']));
            $tpl->replace("DATA_BUTTON", "<button type='submit' name='edit' class='btn btn-warning'>Perbarui</button><a href='matkul.php' class='btn btn-outline-secondary'>Batal</a>");
        } else {
            $tpl->replace("DATA_FORM_TITLE", "Tambah Mata Kuliah");
            $tpl->replace("DATA_INPUT_ID", "");
            $tpl->replace("DATA_VAL_CODE", "");
            $tpl->replace("DATA_VAL_NAME", "");
            $tpl->replace("DATA_VAL_SKS", "3");
            $tpl->replace("DATA_VAL_SEMESTER", "1");
            $tpl->replace("DATA_BUTTON", "<button type='submit' name='add' class='btn btn-primary'>Simpan</button>");
        }

        $tpl->write();
    }
}
