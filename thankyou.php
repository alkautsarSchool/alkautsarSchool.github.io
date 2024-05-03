<?php
// Mulai session
session_start();

// Periksa apakah NIK tersimpan dalam session
if (isset($_SESSION["nik"])) {
    // Lakukan sesuatu dengan NIK
    $nik = $_SESSION["nik"];
    // Membaca nilai dari file JSON
    $file_content = file_get_contents("user.json");
    $data = json_decode($file_content, true);

    // Temukan pengguna berdasarkan NIK
    $users = $data["users"];
    $nama = "";
    foreach ($users as $user) {
        if ($user["nik"] === $nik) {
            $nama = $user["nama"];
            break;
        }
    }

    // Jika nama ditemukan, tampilkan pesan selamat dengan nama pengguna
    if ($nama) {
        echo "<h1>Selamat, $nama</h1>";
    } else {
        // Jika tidak ada nama yang ditemukan, tampilkan pesan default
        echo "<h1>Selamat</h1>";
    }
    echo "<p>Selamat atas kelulusan SMA Anda. Semoga sukses selalu!</p>";
    session_destroy();
} else {
    // Jika NIK tidak tersimpan dalam session, kembalikan ke halaman login atau lakukan sesuatu yang sesuai
    header("Location: index.php");
    session_destroy();
    exit;
}
?>
/var/folders/d3/vzlfd48d5ls6z2yv9hb6f3hw0000gn/T/com.apple.useractivityd/shared-pasteboard/items/6B684635-A2BE-49D6-8898-2899001E80F6/c3df8e0adf52474dfcb06c8303b31264acfc546f.rtfd