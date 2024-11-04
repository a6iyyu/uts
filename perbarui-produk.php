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
    <title>Edit Produk | musikin</title>
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
        </nav>
        <i class="fa fa-bars my-auto inline cursor-pointer text-2xl text-slate-950 lg:hidden"></i>
    </header>

    <!-- Formulir -->
    <?php
    include 'utils/connection.php';

    // Mendapatkan ID produk dari URL
    if (isset($_GET['id'])) {
        $produk_id = $_GET['id'];

        // Query untuk mengambil data produk berdasarkan ID
        $sql = "SELECT * FROM Produk WHERE ProdukID = ?";
        $params = array($produk_id);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $nama = $row['NamaProduk'];
            $harga = $row['Harga'];
            $stok = $row['Stok'];
            $deskripsi = $row['Deskripsi'];
            // Tidak menampilkan gambar dalam form update, karena akan dikelola terpisah
        } else {
            die("Produk tidak ditemukan.");
        }
    } else {
        die("ID produk tidak ditentukan.");
    }
    ?>
    <h3 class="mt-20 mb-6 mx-auto w-4/5 cursor-default text-3xl font-bold">Edit Produk</h3>
    <form action="utils/proses-perbarui-produk.php" method="post" enctype="multipart/form-data" class="mx-auto mb-28 w-4/5 flex flex-col">
        <section class="flex gap-20 items-center justify-between">
            <input
                type="hidden"
                name="id"
                value="<?= htmlspecialchars($produk_id) ?>" />
            <div class="w-full flex flex-col">
                <label for="nama_produk">Nama Produk</label>
                <input
                    type="text"
                    name="nama_produk"
                    id="nama_produk"
                    autocomplete="on"
                    class="mt-1 border-b-2 border-slate-950/50 bg-transparent focus:border-slate-950 focus:outline-none lg:py-3"
                    onchange=""
                    value="<?= htmlspecialchars($nama) ?>" />
            </div>
            <div class="w-full flex flex-col">
                <label for="harga">Harga</label>
                <input
                    type="text"
                    name="harga"
                    id="harga"
                    autocomplete="on"
                    class="mt-1 border-b-2 border-slate-950/50 bg-transparent focus:border-slate-950 focus:outline-none lg:py-3"
                    onchange=""
                    value="<?= htmlspecialchars($harga) ?>" />
            </div>
            <div class="w-full flex flex-col">
                <label for="stok">Stok</label>
                <input
                    type="number"
                    name="stok"
                    id="stok"
                    autocomplete="on"
                    min="0"
                    max="100"
                    class="mt-1 border-b-2 border-slate-950/50 bg-transparent focus:border-slate-950 focus:outline-none lg:py-3"
                    onchange=""
                    value="<?= htmlspecialchars($stok) ?>" />
            </div>
        </section>
        <section class="mt-8 flex flex-col">
            <label for="deskripsi">Deskripsi</label>
            <textarea
                name="deskripsi"
                id="deskripsi"
                autocomplete="off"
                class="resize-none border-b-2 border-slate-950/50 bg-transparent focus:border-slate-950 focus:outline-none lg:py-3"
                onchange=""
                maxlength="3000"
                rows="1">
                <?= htmlspecialchars($deskripsi) ?>
            </textarea>
        </section>
        <section class="mt-8 flex flex-col">
            <button type="submit" class="w-fit cursor-pointer rounded bg-green-800 text-slate-50 px-8 py-4 transition-all duration-300 ease-in-out hover:bg-green-700">
                <i class="fa-solid fa-pencil"></i>&emsp;Edit Produk
            </button>
        </section>
    </form>

    <!-- Footer -->
    <footer class="mt-auto w-full flex flex-col cursor-default bg-slate-950 py-4 text-center text-white">
        <h5>&copy; musikin 2024</h5>
        <a href="https://github.com/a6iyyu" target="_blank" class="transition-all duration-300 ease-in-out lg:hover:underline lg:hover:text-slate-200">Rafi Abiyyu Airlangga</a>
    </footer>
    <script src="utils/script.js"></script>
</body>

</html>