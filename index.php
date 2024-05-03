<?php
// Mulai session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];

    // Membaca nilai dari file JSON
    $file_content = file_get_contents("user.json");
    $data = json_decode($file_content, true);

    // Verifikasi NIK dan nama
    $users = $data["users"];
    $authenticated = false;
    foreach ($users as $user) {
        if ($user["nik"] === $nik && $user["nama"] === $nama) {
            // Jika NIK dan nama sesuai, simpan NIK dalam session
            $_SESSION["nik"] = $nik;
            $authenticated = true;
            break;
        }
    }

    if ($authenticated) {
        header("Location: thankyou.php");
        exit;
    } else {
        // Jika NIK dan nama tidak sesuai, tampilkan pesan kesalahan
        echo "<script>alert('NIK atau Nama salah Coba periksa kembali!');</script>";
    }
}
?>




<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <p id="demo"></p>
   <title>SMA IT AL Kautsar</title>
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
   <div class="bg-img">
      <div class="content">
         <header>HASIL KELULUSAN SMA IT AL-KAUTSAR 2024</header>
         <div>Masukkan Nomor Induk dan Nama.</div>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="field">
               <span class="fa"></span>
               <input type="text" name="nik" required placeholder="NIK">
            </div>
            <div class="field space">
               <span class="fa"></span>
               <input type="text" name="nama" required placeholder="NAMA LENGKAP">
               <!-- <span class="show">SHOW</span> -->
            </div>
            <div class="pass">
            </div>
            <div class="field">
               <input type="submit" value="LIHAT HASIL">
            </div>
         </form>
      </div>
   </div>

</body>

</html>


<script>
   // Set the date we're counting down to
   var countDownDate = new Date("May 6, 2024 14:00:00").getTime();

   // Update the count down every 1 second
   var x = setInterval(function () {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
         minutes + "m " + seconds + "s ";

      // If the count down is finished, write some text
      if (distance < 0) {
         clearInterval(x);
         document.getElementById("demo").innerHTML = "EXPIRED";
      }
   }, 1000);
</script>