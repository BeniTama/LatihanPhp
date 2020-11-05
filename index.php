<?php
// Total array yang disiapkan untuk disimpan
$todos = [];
// Melakukan pengecekan apakah file todo.txt ditemukan
if (file_exists('todo.txt')) {
    // Membaca file todo.txt
    $file = file_get_contents('todo.txt');
    // Mengubah format serialize menjadi array
    $todos = unserialize($file);
}

// Jika ditemukan todo yang dikirim melalui POST
if (isset($_POST['todo'])) {
    // Mengambil data yang diinput pada form
    $data = $_POST['todo'];
    $todos[] = [
        'todo' => $data,
        'status' => 0
    ];
    saveData($todos);
}

// Jika ditemukan $_GET['status']
if (isset($_GET['status'])) {
    // Mengubah status
    $todos[$_GET['key']]['status'] = $_GET['status'];
    saveData($todos);
}

// Jika ditemukan perintah hapus
if (isset($_GET['hapus'])) {
    // Hapus data sesuai key yang dipilih
    unset($todos[$_GET['key']]);
    saveData($todos);
}

function saveData($todos)
{
    file_put_contents('todo.txt', serialize($todos));
    // Redirect halaman
    header('Location:index.php');
}

?>

<h1>Todo App</h1>

<form method="POST">
    <label>Apa kegiatanmu hari ini?</label>
    <input type="text" name="todo">
    <button type="submit">Simpan</button>
</form>

<ul>
    <!-- Menampilkan data kedalam list menggunakan foreach -->
    <?php foreach ($todos as $key => $value) : ?>
        <li>
            <input type="checkbox" name="todo" onclick="window.location.href='index.php?status=<?php echo ($value['status'] == 1) ? '0' : '1'; ?> &key=<?php echo $key; ?>'" <?php if ($value['status'] == 1) echo 'checked' ?>>
            <label>
                <?php
                if ($value['status'] == 1) {
                    echo '<del>' . $value['todo'] . '</del>';
                } else
                    echo $value['todo']; ?>
            </label>
            <!-- Menambahkan url sebagai action link untuk menghapus -->
            <!-- Membuat konfirmasi penghapusan dengan onclick -->
            <a href="index.php?hapus=1&key=<?= $key; ?>" onclick="return confirm('Apa kamu yakin akan menghapus ini?')">hapus</a>
        </li>
    <?php endforeach; ?>
</ul>