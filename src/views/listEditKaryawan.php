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
            <aside class="flex flex-col w-fit h-auto px-4 py-8 overflow-y-auto border-r rtl:border-r-0 rtl:border-l bg-gray-900 border-gray-700">
                <a href="#" class="flex justify-center">
                    <img class="w-auto h-24 " src="https://jec.co.id/storage/upload/Admedika2.jpg" alt="gambar">
                </a>

                <!-- <div class="relative mt-6">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                <path
                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                </path>
            </svg>
        </span>

        <input type="text"
            class="w-full py-2 pl-10 pr-4 border rounded-md bg-gray-900 text-gray-300 border-gray-600 focus:border-blue-300 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
            placeholder="Search" />
    </div> -->

                <div class="flex flex-col justify-between flex-1 mt-6">
                    <nav>
                        <a class="flex items-center px-4 py-2 rounded-md bg-gray-800 text-gray-200" href="/?dashboard">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20px" height="20px">
                                <path class="fill-current text-white" d="M23.121,9.069,15.536,1.483a5.008,5.008,0,0,0-7.072,0L.879,9.069A2.978,2.978,0,0,0,0,11.19v9.817a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V11.19A2.978,2.978,0,0,0,23.121,9.069ZM15,22.007H9V18.073a3,3,0,0,1,6,0Zm7-1a1,1,0,0,1-1,1H17V18.073a5,5,0,0,0-10,0v3.934H3a1,1,0,0,1-1-1V11.19a1.008,1.008,0,0,1,.293-.707L9.878,2.9a3.008,3.008,0,0,1,4.244,0l7.585,7.586A1.008,1.008,0,0,1,22,11.19Z" />
                            </svg>
                            <span class="mx-4 font-medium">Dashboard</span>
                        </a>

                        <a class="flex items-center px-4 py-2 mt-5 text-gray-400 transition-colors duration-300 transform rounded-md hover:bg-gray-800 hover:text-gray-200 active:bg-gray-800 active:text-gray-200 hover:fill-current" href="/?dataKaryawan">

                            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
                                <path d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z" />
                                <path d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z" />
                            </svg>
                            <span class="mx-4 font-medium">Tambah Karyawan</span>
                        </a>

                        <a class="flex items-center px-4 py-2 mt-5 text-gray-400 transition-colors duration-300 transform rounded-md hover:bg-gray-800 hover:text-gray-200 active:bg-gray-800 active:text-gray-200 hover:fill-current" href="/?listKaryawan">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                                <path d="m19,1H5C2.243,1,0,3.243,0,6v12c0,2.757,2.243,5,5,5h14c2.757,0,5-2.243,5-5V6c0-2.757-2.243-5-5-5Zm3,17c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V6c0-1.654,1.346-3,3-3h14c1.654,0,3,1.346,3,3v12Zm-3-11c0,.552-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1h7c.552,0,1,.448,1,1Zm-11,0c0,.828-.672,1.5-1.5,1.5s-1.5-.672-1.5-1.5.672-1.5,1.5-1.5,1.5.672,1.5,1.5Zm11,5c0,.552-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1h7c.552,0,1,.448,1,1Zm-11,0c0,.828-.672,1.5-1.5,1.5s-1.5-.672-1.5-1.5.672-1.5,1.5-1.5,1.5.672,1.5,1.5Zm11,5c0,.552-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1h7c.552,0,1,.448,1,1Zm-11,0c0,.828-.672,1.5-1.5,1.5s-1.5-.672-1.5-1.5.672-1.5,1.5-1.5,1.5.672,1.5,1.5Z" />
                            </svg>
                            <span class="mx-4 font-medium">List Karyawan</span>
                        </a>

                        <hr class="my-6 border-gray-200 dark:border-gray-600" />

                        <form action="/?logout" method="post" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 cursor-pointer">
                            <button type="submit" class="flex flex-row cursor-pointer w-full align-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 id=" Layer_1" data-name="Layer 1" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.476,15a1,1,0,0,0-1,1v3a3,3,0,0,1-3,3H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2H7.476a3,3,0,0,1,3,3V8a1,1,0,0,0,2,0V5a5.006,5.006,0,0,0-5-5H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H7.476a5.006,5.006,0,0,0,5-5V16A1,1,0,0,0,11.476,15Z" />
                                    <path d="M22.867,9.879,18.281,5.293a1,1,0,1,0-1.414,1.414l4.262,4.263L6,11a1,1,0,0,0,0,2H6l15.188-.031-4.323,4.324a1,1,0,1,0,1.414,1.414l4.586-4.586A3,3,0,0,0,22.867,9.879Z" />
                                </svg>
                                <span class="h-auto mx-4 font-medium">Logout</span>
                            </button>

                        </form>
                    </nav>
                </div>
            </aside>
            <?php
            if ($error) {
            ?>
                <div class="min-w-max alert alert-error mt-4 rounded-md text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Gagal mengupdate data karyawan!</span>
                </div>
            <?php
            }
            ?>

            <?php
            if ($success) {
            ?>
                <div class="max-w-full alert alert-success mt-4 rounded-md text-white fill-current">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Berhasil mengupdate data karyawan!</span>
                </div>

            <?php
            }
            ?>

            <div class="flex flex-col max-w-full h-auto p-4 border border-blue-400 bg-blue-50 mt-4 rounded-md text-gray-800 placeholder-gray-400">
                <h1 class="font-medium text-md">Edit Data</h1>

                <form action="" method="POST" class="p-4">
                    <div class="mb-3 flex flex-col">
                        <label for="nama" class="mb-1">Nama</label>
                        <input type="text" class="bg-white px-3 py-2 border rounded-md" id="nama" name="nama" value="<?php echo $nama ?>">
                    </div>

                    <div class="mb-3 flex flex-col">
                        <label for="nik" class="mb-1">NIK</label>
                        <input type="text" class="bg-white px-3 py-2 border rounded-md" id="nik" name="nik" value="<?php echo $nik ?>">
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="direktorat" class="mb-1">Direktorat</label>
                        <input type="text" class="bg-white px-3 py-2 border rounded-md" id="direktorat" name="direktorat" value="<?php echo $direktorat ?>">
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="departemen" class="mb-1">Direktorat</label>
                        <input type="text" class="bg-white px-3 py-2 border rounded-md" id="departemen" name="departemen" value="<?php echo $departemen ?>">
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="unit" class="mb-1">Unit</label>
                        <input type="text" class="bg-white px-3 py-2 border rounded-md" id="unit" name="unit" value="<?php echo $unit ?>">
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="jobTitle" class="mb-1">Nama Jabatan</label>
                        <input type="text" class="bg-white px-3 py-2 border rounded-md" id="jobTitle" name="jobTitle" value="<?php echo $jobTitle ?>">
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="tglEfektifResign" class="mb-1">Tanggal Efektif Resign</label>
                        <input type="text" class="bg-white px-3 py-2 border rounded-md" id="tglEfektifResign" name="tglEfektifResign" value="<?php echo $tglEfektifResign ?>">
                        <div class="col-12 mt-4">
                            <input type="submit" name="submit" value="Simpan Data" class="px-4 py-2 bg-blue-500 text-white rounded-md cursor-pointer" />
                        </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>