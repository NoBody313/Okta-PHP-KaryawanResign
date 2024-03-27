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
        <?php include('/php/okta-php-core-login-example/src/views/layout/sidebar.php'); ?>
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