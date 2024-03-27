<?php 
include('/php/okta-php-core-login-example/src/db/database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karyawan</title>
    <link rel="stylesheet" href="../resources/css/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex flex-col bg-white h-screen">
        <div class="flex flex-col p-4 m-4">
        <?php include('/php/okta-php-core-login-example/src/views/layout/sidebar.php'); ?>
            <?php 
                if($error) {
                ?>
            <div class="min-w-max alert alert-error mt-4 rounded-md text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Gagal mengupdate data karyawan!</span>
            </div>
            <?php 
                }
                ?>

            <?php 
                if($success) {
                ?>
            <div class="max-w-full alert alert-success mt-4 rounded-md text-white fill-current">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Berhasil mengupdate data karyawan!</span>
            </div>

            <?php 
                }
                ?>

            <div
                class="flex flex-col max-w-full h-auto p-4 border border-blue-400 bg-blue-50 mt-4 rounded-md text-gray-800 placeholder-gray-400">
                <h1 class="font-medium text-md">Edit Data</h1>

                <form action="" method="POST" class="p-4">
                    <div class="mb-3 flex flex-col">
                        <label for="nama" class="mb-1">Nama</label>
                        <input type="text" class="bg-white px-3 py-2 border rounded-md" id="nama" name="nama"
                            value="<?php echo $nama ?>">
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="nik" class="mb-1">NIK</label>
                        <input type="text" class="bg-white px-3 py-2 border rounded-md" id="nik" name="nik"
                            value="<?php echo $nik ?>">
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="direktorat" class="mb-1">Direktorat</label>
                        <input type="text" class="bg-white px-3 py-2 border rounded-md" id="direktorat"
                            name="direktorat" value="<?php echo $direktorat ?>">
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="departemen" class="mb-1">Direktorat</label>
                        <input type="text" class="bg-white px-3 py-2 border rounded-md" id="departemen"
                            name="departemen" value="<?php echo $departemen ?>">
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="unit" class="mb-1">Unit</label>
                        <input type="text" class="bg-white px-3 py-2 border rounded-md" id="unit" name="unit"
                            value="<?php echo $unit ?>">
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="jobTitle" class="mb-1">Nama Jabatan</label>
                        <input type="text" class="bg-white px-3 py-2 border rounded-md" id="jobTitle" name="jobTitle"
                            value="<?php echo $jobTitle ?>">
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="tglEfektifResign" class="mb-1">Tanggal Efektif Resign</label>
                        <input type="text" class="bg-white px-3 py-2 border rounded-md" id="tglEfektifResign"
                            name="tglEfektifResign" value="<?php echo $tglEfektifResign ?>">
                        <div class="col-12 mt-4">
                            <input type="submit" name="submit" value="Simpan Data"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md cursor-pointer" />
                        </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>