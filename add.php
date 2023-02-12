<form method="POST">

<p>İlan Başlık: <input name="baslik" placeholder="Başlık Giriniz" type="text">  </p>
<p>İlan Tarih: <input name="tarih" type="date">  </p>
<p>İlan Detay: <input name="detay" placeholder="Detay Giriniz" type="text">  </p>
<p>İlan Telefon: <input name="telefon" placeholder="Telefon Giriniz" type="text">  </p>
<p>İlan Lokasyon: <input name="konum" placeholder="" type="text">  </p>
<p> <input type="submit" value="Ekle"> </p>

</form>

<p><a href='index.php'>ANASAYFAYA DÖN</a></p>

<?php

    require_once "db.php";

    if(isset($_POST["baslik"])){

        $baslik = $_POST["baslik"];
        $tarih = $_POST["tarih"];
        $detay = $_POST["detay"];
        $telefon = $_POST["telefon"];
        $konum = $_POST["konum"];


        $sql = "INSERT INTO ilanlar (tarih,baslik,detay,telefon,konum) VALUES (:tarih, :baslik, :detay, :telefon, :konum) ";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":tarih",$tarih);
        $stmt->bindParam(":baslik",$baslik);
        $stmt->bindParam(":detay",$detay);
        $stmt->bindParam(":telefon",$telefon);
        $stmt->bindParam(":konum",$konum);
        
        $stmt->execute();

        echo "İlan başarıyla kaydedildi!";

    }

?>



