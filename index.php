<!DOCTYPE html>
<html lang="en" class="scroll-p-10">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex" />
    <meta name="og:title" content="" />
    <meta name="og:description" content="" />
    <meta name="og:image" content="" />
    <title>Beranda | musikin</title>
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="style/output.css" />
    <link rel="icon" href="" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+US+Trad:wght@100..400&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="mx-auto flex flex-col max-w-[1440px] min-h-screen overflow-x-hidden bg-slate-100">
    <div id="scroll-indicator" class="fixed z-40 top-0 h-1 bg-blue-500"></div>
    <!-- Header -->
    <header class="mx-auto flex h-28 w-4/5 justify-between text-slate-950">
        <span class="absolute right-0 top-0 -z-10 h-96 w-96 bg-teal-500/20 blur-3xl"></span>
        <a href="index.php" class="my-auto grid place-items-center select-auto bg-gradient-to-r from-blue-500 via-teal-500 to-pink-500 bg-clip-text text-4xl font-black text-transparent">
            musikin
        </a>
        <nav class="hidden h-full w-4/5 text-lg font-semibold lg:flex lg:w-5/6 lg:items-center lg:justify-end">
            <a href="tentang-kami.php" class="mr-14 transition-all duration-300 ease-in-out hover:text-slate-800 hover:underline">
                Tentang Kami
            </a>
            <a href="tambah-produk.php" class="rounded-lg bg-green-800 text-slate-50 px-6 py-3 transition-all duration-300 ease-in-out hover:bg-green-700">
                Tambah Produk
            </a>
        </nav>
        <i class="fa fa-bars my-auto inline cursor-pointer text-2xl text-slate-950 lg:hidden"></i>
    </header>

    <!-- Hero -->
    <section class="mx-auto mt-28 w-4/5 flex flex-col items-center justify-center">
        <h2 class="cursor-default font-black text-center text-4xl">
            Temukan Alunan Harmoni di
            <span class="select-auto bg-gradient-to-r from-blue-500 via-teal-500 to-pink-500 bg-clip-text text-4xl font-black text-transparent">
                musikin
            </span>
        </h2>
        <h4 class="mt-6 w-full cursor-default text-center text-xl lg:w-4/5">
            Bawa musik ke dalam hidup Anda dengan alat musik berkualitas. Dari pemula hingga profesional, kami hadir untuk memenuhi semua kebutuhan musik Anda.
        </h4>
        <button type="button" id="mulai-belanja" class="mt-10 h-fit w-fit cursor-pointer rounded-xl bg-slate-950 px-9 py-5 text-lg font-bold text-slate-50 transition-all duration-300 ease-in-out [box-shadow:0.3rem_0.3rem_0_rgb(71_85_105)] hover:bg-slate-800 xl:hover:scale-105">
            Mulai Belanja&ensp;<i class="fa-solid fa-arrow-right text-base"></i>
        </button>
    </section>
    <hr class="mx-auto my-28 h-0.5 w-4/5 bg-slate-950" />

    <!-- List Of rows -->
    <main class="mx-auto mb-24 w-4/5 flex flex-col" id="daftar-alat-musik">
        <span class="absolute left-0 top-80 -z-10 h-96 w-96 bg-teal-500/20 blur-3xl"></span>
        <section class="cursor-default font-bold text-center text-4xl">
            Daftar Alat Musik
        </section>
        <section class="mt-10 grid grid-cols-1 place-items-center gap-12 lg:grid-cols-3 sm:grid-cols-2">
            <?php
            include "utils/connection.php";

            $sql = "SELECT * FROM Produk";
            $stmt = sqlsrv_query($conn, $sql);

            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                // Menampilkan produk dengan onclick yang akan memanggil fungsi JavaScript untuk membuka modal
                $produk_id = $row['ProdukID'];
                if ($row['Gambar'] > 0) {
                    $base64Image = base64_encode($row['Gambar']);

                    echo
                    "<figure class='w-full flex cursor-pointer flex-col items-center justify-center py-10 rounded-xl bg-slate-100 border-2 border-slate-950/30'>
                    <img src='data:image/jpeg;base64, $base64Image' alt='Gambar Produk' class='w-4/5 rounded-2xl transition-all duration-300 ease-in-out xl:hover:scale-105' />
                    <div class='mx-auto mt-4 w-4/5 flex flex-col'>
                        <div class='flex items-center justify-between'>
                            <figcaption class='group text-justify text-slate-950 transition-all duration-300 ease-in-out'>
                                <span class='font-bold lg:bg-gradient-to-r lg:from-sky-500 lg:to-sky-500 lg:bg-[length:0%_0.125rem] lg:bg-left-bottom lg:bg-no-repeat lg:transition-all lg:duration-500 lg:ease-out lg:group-hover:bg-[length:100%_0.125rem]'>
                                    $row[NamaProduk]  
                                </span>
                            </figcaption>
                            <h5 class='text-sm'>
                                Stok: $row[Stok]
                            </h5>
                        </div>
                        <figcaption class='group text-justify text-slate-950 transition-all duration-300 ease-in-out'>
                            <em class='lg:bg-gradient-to-r lg:from-sky-500 lg:to-sky-500 lg:bg-[length:0%_0.125rem] lg:bg-left-bottom lg:bg-no-repeat lg:transition-all lg:duration-500 lg:ease-out lg:group-hover:bg-[length:100%_0.125rem]'>
                                $row[Harga]
                            </em>
                        </figcaption>
                        <figcaption class='group text-justify text-slate-950 transition-all duration-300 ease-in-out'>
                            <span class='lg:bg-gradient-to-r lg:from-sky-500 lg:to-sky-500 lg:bg-[length:0%_0.125rem] lg:bg-left-bottom lg:bg-no-repeat lg:transition-all lg:duration-500 lg:ease-out lg:group-hover:bg-[length:100%_0.125rem]'>
                                $row[Deskripsi]
                            </span>
                        </figcaption>
                    </div>
                   <button type='button' class='mt-8 w-4/5 py-3 rounded-md bg-green-700 text-slate-50 transition-all duration-300 ease-in-out xl:hover:bg-green-600' onclick=\"window.location.href='perbarui-produk.php?id={$produk_id}'\">
                        <i class='fa-solid fa-pencil mr-3' aria-hidden='true'></i>
                        Edit
                    </button>
                    <button type='button' class='mt-4 w-4/5 py-3 rounded-md bg-red-500 text-slate-50 transition-all duration-300 ease-in-out xl:hover:bg-red-400' onclick=\"if(confirm('Apakah Anda yakin ingin menghapus produk ini?')) { window.location.href='utils/proses-hapus-produk.php?id={$produk_id}' }\">
                        <i class='fa-solid fa-trash mr-3' aria-hidden='true'></i>
                        Hapus
                    </button>
                </figure>";
                }
            }
            ?>
        </section>
    </main>

    <!-- Footer -->
    <footer class="mt-auto w-full flex flex-col cursor-default bg-slate-950 py-4 text-center text-white">
        <h5>&copy; musikin 2024</h5>
        <a href="https://github.com/a6iyyu" target="_blank" class="mx-auto w-fit transition-all duration-300 ease-in-out xl:hover:underline xl:hover:text-slate-200">Rafi Abiyyu Airlangga</a>
    </footer>
    <script src="utils/script.js"></script>
</body>

</html>