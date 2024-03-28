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
    <div class="flex flex-col bg-white">
        <div class="flex flex-row" id="sideHeader">
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
            <section class="content flex flex-col w-full min-h-screen p-4">
                <div class="flex flex-col w-full p-6 bg-gray-800 border border-gray-200 rounded-lg">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="/views/dashboard.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="/views/dashboard.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                Daftar Karyawan
                            </a>
                        </ol>
                    </nav>

                    <div class="flex flex-col mt-4">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Daftar Karyawan
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Let's set new data today.</p>
                    </div>
                </div>

                <?php
                if ($errorImport) {
                ?>
                    <div class="alert alert-error mt-4 mb-0 rounded-md text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span><?php echo $errorImport ?></span>
                    </div>
                <?php
                }
                ?>

                <?php
                if ($successImport) {
                ?>
                    <div class="alert alert-success mt-4 rounded-md text-white fill-current">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span><?php echo $successImport ?></span>
                    </div>
                <?php
                }
                ?>

                <div class="excelFun flex flex-row w-auto h-auto px-4 justify-end">
                    <div class="importExcel w-auto px-8 py-4 ">
                        <form class="pb-4 pt-4" action="" method="POST" enctype="multipart/form-data">
                            <input type="file" accept=".xls,.xlsx" name="fileExcel" id="uploadFile" class="file-input file-input-bordered file-input-info w-auto bg-white" />
                            <input type="submit" value="Submit" name="submitImport" class="px-8 py-3 bg-blue-500 rounded-md text-white font-medium" />
                        </form>
                    </div>

                    <div class="exportExcel pt-2">

                        <a href="listKaryawan.php?exportExcel=1" id="exportExcel" target="_blank" class="flex flex-row my-4 py-4 px-8 bg-green-500 text-white font-medium text-base rounded-md leading-8">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-8 h-8 mr-4"">
                                <rect width=" 16" height="9" x="28" y="15" fill="#21a366" />
                                <path fill="#185c37" d="M44,24H12v16c0,1.105,0.895,2,2,2h28c1.105,0,2-0.895,2-2V24z" />
                                <rect width="16" height="9" x="28" y="24" fill="#107c42" />
                                <rect width="16" height="9" x="12" y="15" fill="#3fa071" />
                                <path fill="#33c481" d="M42,6H28v9h16V8C44,6.895,43.105,6,42,6z" />
                                <path fill="#21a366" d="M14,6h14v9H12V8C12,6.895,12.895,6,14,6z" />
                                <path d="M22.319,13H12v24h10.319C24.352,37,26,35.352,26,33.319V16.681C26,14.648,24.352,13,22.319,13z" opacity=".05" />
                                <path d="M22.213,36H12V13.333h10.213c1.724,0,3.121,1.397,3.121,3.121v16.425	C25.333,34.603,23.936,36,22.213,36z" opacity=".07" />
                                <path d="M22.106,35H12V13.667h10.106c1.414,0,2.56,1.146,2.56,2.56V32.44C24.667,33.854,23.52,35,22.106,35z" opacity=".09" />
                                <linearGradient id="flEJnwg7q~uKUdkX0KCyBa" x1="4.725" x2="23.055" y1="14.725" y2="33.055" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#18884f" />
                                    <stop offset="1" stop-color="#0b6731" />
                                </linearGradient>
                                <path fill="url(#flEJnwg7q~uKUdkX0KCyBa)" d="M22,34H6c-1.105,0-2-0.895-2-2V16c0-1.105,0.895-2,2-2h16c1.105,0,2,0.895,2,2v16	C24,33.105,23.105,34,22,34z" />
                                <path fill="#fff" d="M9.807,19h2.386l1.936,3.754L16.175,19h2.229l-3.071,5l3.141,5h-2.351l-2.11-3.93L11.912,29H9.526	l3.193-5.018L9.807,19z" />
                                </svg>
                            </span>
                            Export
                        </a>
                    </div>
                </div>

                <div class="flex flex-col w-full p-4 border border-blue-400 bg-blue-50 rounded-md text-gray-800 placeholder-gray-400">
                    <table class="max-w-full divide-y-2  divide-blue-950 text-center">
                        <thead>
                            <tr class="pb-4">
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-blue-900" scope="col">No</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-blue-900" scope="col">NIK</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-blue-900" scope="col">Nama</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-blue-900" scope="col">Direktorat
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-blue-900" scope="col">Departemen
                                </th>
                                <!-- <th class="whitespace-nowrap px-4 py-2 font-medium text-blue-900" scope="col">Unit</th> -->
                                <!-- <th class="whitespace-nowrap px-4 py-2 font-medium text-blue-900" scope="col">Job Title</th> -->
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-blue-900" scope="col">Tgl Efektif Resign</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-blue-900" scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-blue-200">
                            <?php
                            $sql2   = "SELECT * FROM dataKaryawan ORDER BY id ASC";
                            $query2 = mysqli_query($conn, $sql2);
                            while ($row = mysqli_fetch_array($query2)) {
                                $id = $row['id'];
                                $nik = $row['nik'];
                                $nama = $row['nama'];
                                $direktorat = $row['direktorat'];
                                // $departemen = $row['departemen'];
                                // $unit = $row['unit'];
                                $jobTitle = $row['jobTitle'];
                                $tglEfektifResign = $row['tglEfektifResign'];

                            ?>
                                <tr>
                                    <th class="whitespace-nowrap px-4 py-2 text-blue-800" scope="row"><?php echo $id ?>
                                    </th>
                                    <td class="whitespace-nowrap px-4 py-2 text-blue-800" scope="row"><?php echo $nik ?>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-2 text-blue-800" scope="row"><?php echo $nama ?>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-2 text-blue-800" scope="row">
                                        <?php echo $direktorat ?></td>
                                    <!-- <td class="whitespace-nowrap px-4 py-2 text-blue-800" scope="row"><?php echo $departemen ?></td> -->
                                    <!-- <td class="whitespace-nowrap px-4 py-2 text-blue-800" scope="row"><?php echo $unit ?></td> -->
                                    <td class="whitespace-nowrap px-4 py-2 text-blue-800" scope="row">
                                        <?php echo $jobTitle ?></td>
                                    <td class="whitespace-nowrap px-4 py-2 text-blue-800" scope="row">
                                        <?php echo $tglEfektifResign; ?></td>
                                    <!-- op Di sini dalam artian Option -->
                                    <td class="whitespace-nowrap px-4 py-2 text-blue-700" scope="row">
                                        <a href="listEditKaryawan.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-info bg-blue-300 text-blue-800">Edit</button></a>
                                        <a href="listEditKaryawan.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')"><button type="button" class="btn btn-error bg-red-300 text-red-800">Delete</button></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</body>

</html>