<?php

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "karyawandb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_query($conn, "ALTER TABLE dataKaryawan AUTO_INCREMENT = 1");

// Nampilin Data
$id                 = "";
$nama               = "";
$nik                = "";
$direktorat         = "";
$departemen         = "";
$unit               = "";
$jobTitle           = "";
$tglEfektifResign   = "";
$success            = "";
$error              = "";

$errorImport        = "";
$successImport      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    $id             = $_GET['id'];
    $deleteQuery    = "DELETE FROM dataKaryawan WHERE id = '$id'";
    $deleteCall     = mysqli_query($conn, $deleteQuery);

    if ($deleteCall) {
        header('Location: /views/listKaryawan.php');
        $success    = "Berhasil menghapus data";
    } else {
        $error      = "Gagal menghapus data";
    }
}

// Edit Data
if ($op == 'edit') {
    $id = $_GET['id'];
    $select = "SELECT * FROM dataKaryawan WHERE id = '$id'";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($result);

    if ($row) {
        $nik               = $row['nik'];
        $nama                = $row['nama'];
        $direktorat         = $row['direktorat'];
        $departemen         = $row['departemen'];
        $unit               = $row['unit'];
        $jobTitle           = $row['jobTitle'];
        $tglEfektifResign   = $row['tglEfektifResign'];
    } else {
        $error = "Data tidak ditemukan";
    }
}

// Submit Button
if (isset($_POST['submit'])) {
    // Sanitasi input menggunakan mysqli_real_escape_string atau parameterized query
    $nik                = mysqli_real_escape_string($conn, $_POST["nik"]);
    $nama               = mysqli_real_escape_string($conn, $_POST["nama"]);
    $direktorat         = mysqli_real_escape_string($conn, $_POST["direktorat"]);
    $departemen         = mysqli_real_escape_string($conn, $_POST["departemen"]);
    $unit               = mysqli_real_escape_string($conn, $_POST["unit"]);
    $jobTitle           = mysqli_real_escape_string($conn, $_POST["jobTitle"]);
    $tglEfektifResign   = mysqli_real_escape_string($conn, $_POST["tglEfektifResign"]);

    if ($nik && $nama && $direktorat && $unit && $jobTitle && $tglEfektifResign) {
        if ($op == 'edit') { // Update Data
            $updateQuery = "UPDATE dataKaryawan SET nik = '$nik', nama = '$nama', direktorat = '$direktorat', departemen = '$departemen', unit = '$unit', jobTitle = '$jobTitle', tglEfektifResign = '$tglEfektifResign' WHERE id = '$id'";
            $updateCall = mysqli_query($conn, $updateQuery);

            if ($updateCall) {
                header("location: /views/listKaryawan.php");
                $success = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate: " . mysqli_error($conn);
            }
        } else { // Insert Data
            $insertQuery = "INSERT INTO dataKaryawan (nik, nama, direktorat, departemen, unit, jobTitle, tglEfektifResign) VALUES ('$nik', '$nama', '$direktorat', '$departemen', '$unit', '$jobTitle', '$tglEfektifResign')";
            $insertCall = mysqli_query($conn, $insertQuery);

            if ($insertCall) {
                header("location: /views/listKaryawan.php");
                $success = "Berhasil memasukkan data karyawan";
            } else {
                $error = "Gagal memasukkan data: " . mysqli_error($conn);
            }
        }
    } else {
        $error = "Semua field harus diisi";
    }
}

// Export Import
if (isset($_POST['submitImport'])) {
    $errorImport        = "";
    $extensi            = "";
    $successImport      = "";

    $fileName   = $_FILES['fileExcel']['name'];
    $fileData     = $_FILES['fileExcel']['tmp_name'];

    if (empty($fileData)) {
        $errorImport = "<li>Silahkan masukan file yang ingin diupload</li>";
    } else {
        $extensi = pathinfo($fileName)['extension'];
    }

    $ekstensiValid = array("xls", "xlsx");
    if (!in_array($extensi, $ekstensiValid)) {
        $errorImport = "<p>Silahkan masukan extensi file tipe Xls, atau Xlsx. File yang anda masukan <b>$fileName</b> punya tipe file <b>$extensi</b></p>";
    }

    if (empty($errorImport)) {
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($fileData);
        $spreadsheet = $reader->load($fileData);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $insertImport = "INSERT INTO dataKaryawan (nik, nama, direktorat, departemen, unit, jobTitle, tglEfektifResign) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertImport);

        if ($stmt) {
            $jumlahData = 0;
            for ($i = 1; $i < count($sheetData); $i++) {
                $nik = $sheetData[$i]['1'];
                $nama = $sheetData[$i]['2'];
                $direktorat = $sheetData[$i]['3'];
                $departemen = $sheetData[$i]['4'];
                $unit = $sheetData[$i]['5'];
                $jobTitle = $sheetData[$i]['6'];
                $tglEfektifResign = $sheetData[$i]['7'];

                $tglEfektifResignExplode = explode("/", $tglEfektifResign);
                $tglEfektifResign = $tglEfektifResignExplode[2] . "-" . $tglEfektifResignExplode[1] . "-" . $tglEfektifResignExplode[0];

                if (
                    $nik !== null && $nama !== null && $direktorat !== null && $departemen !== null && $unit !== null && $jobTitle !== null && $tglEfektifResign !== null &&
                    $nik !== '' && $nama !== '' && $direktorat !== '' && $departemen !== '' && $unit !== '' && $jobTitle !== '' && $tglEfektifResign !== ''
                ) {
                    mysqli_stmt_bind_param($stmt, 'sssssss', $nik, $nama, $direktorat, $departemen, $unit, $jobTitle, $tglEfektifResign);

                    if (mysqli_stmt_execute($stmt)) {
                        $jumlahData++;
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
            }

            mysqli_stmt_close($stmt);

            if ($jumlahData != 0) {
                $successImport = "$jumlahData Berhasil dimasukkan";
                header("refresh: 2");
            }
        }
    }
}

// export Excel
if (isset($_REQUEST['exportExcel'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nik');
    $sheet->setCellValue('C1', 'Nama');
    $sheet->setCellValue('D1', 'Direktorat');
    $sheet->setCellValue('E1', 'Departemen');
    $sheet->setCellValue('F1', 'Unit');
    $sheet->setCellValue('G1', 'Job Title');
    $sheet->setCellValue('H1', 'Tgl Efektif Resign');
    $data = mysqli_query($conn, "SELECT * FROM dataKaryawan");
    $i = 2;
    $no = 1;
    while ($d = mysqli_fetch_array($data)) {
        $sheet->setCellValue('A' . $i, $no++);
        $sheet->setCellValue('B' . $i, $d['nik']);
        $sheet->setCellValue('C' . $i, $d['nama']);
        $sheet->setCellValue('D' . $i, $d['direktorat']);
        $sheet->setCellValue('E' . $i, $d['departemen']);
        $sheet->setCellValue('F' . $i, $d['unit']);
        $sheet->setCellValue('G' . $i, $d['jobTitle']);
        $sheet->setCellValue('H' . $i, $d['tglEfektifResign']);
        $i++;
    }

    $writer = new Xlsx($spreadsheet);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Data Karyawan.xlsx"');
    $writer->save('php://output');
} 

?>

<?php
if (isset($_REQUEST['exportExcel'])) {
    header('Location: database.php');
    exit;
}
?>