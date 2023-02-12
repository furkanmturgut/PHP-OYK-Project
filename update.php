<?php

require_once "db.php";

//Güncelleme
if(isset($_POST["baslik"])){

    $baslik = $_POST["baslik"];
    $tarih = $_POST["tarih"];
    $detay = $_POST["detay"];
    $telefon = $_POST["telefon"];
    $konum = $_POST["konum"];
    $id = $_GET["id"];

    $sql = "UPDATE ilanlar SET baslik = :baslik, tarih = :tarih, detay = :detay, telefon = :telefon , konum = :konum WHERE id = :id";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':baslik', $baslik);
    $stmt->bindParam(':tarih', $tarih);
    $stmt->bindParam(':detay', $detay);
    $stmt->bindParam(':telefon', $telefon);
    $stmt->bindParam(':konum', $konum);
    $stmt->bindParam(':id', $id);

    $stmt->execute();
    echo "İlan güncellendi";
    
}

$id = $_GET["id"];

$sql = "SELECT * FROM ilanlar WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

$ilanlar = $stmt->fetchAll(PDO::FETCH_ASSOC);
$ilan = $ilanlar[0];

?>


<h1>İlan Güncelleme</h1>


<form method='POST'>
<table border='1' cellpadding='10' cellspacing='0' width='500'>
    <tr>
        <th nowrap>İlan Başlığı</th>
        <td><input type='text' name='baslik' value='<?php echo $ilan['baslik']; ?>' style='width:400px;'></td> 
    </tr>
    <tr>
        <th nowrap>İlan Tarihi</th>
        <td><input type='date' name='tarih'   value='<?php echo $ilan['tarih'];  ?>'</td> 
    </tr>
    <tr>
        <th>Detay</th>
        <td><textarea name="detay" style='width:400px; height:150px'><?php echo $ilan['detay']; ?></textarea>  
    </tr>
    <tr>
        <th>Telefon</th>
        <td><input type='text' name='telefon' value='<?php echo $ilan['telefon']; ?>'</td> 
    </tr>

    <tr>
        <th>Konum</th>
        <td><input type='text' name='konum' value='<?php echo $ilan['konum']; ?>'</td> 
    </tr>
    <tr>
        <td>
            Kayıt Durumu
        </td>
        <td>
            <select name="durum" id="durum" onchange="gostergizle()" style='width:100px'>
            <option value="1">Aktif</option>
            <option value="2">Silinsin</option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan='2'>
            <center><input type='submit' value='GÜNCELLE'></center>
        </td>
    </tr>   
</table>

</form>

<p id='sildugmesi' style='display:none'>
    <a href='delete.php?id=<?php echo $ilan['id']; ?>'>İlanı Sil</a>
</p>


<p><a href='list.php'  >Geri Dön </a></p>

<script>
    function gostergizle(){
        if(document.getElementById('durum').value=='1') {
            document.getElementById('sildugmesi').style.display='none'
        }
        if(document.getElementById('durum').value=='2') {
            document.getElementById('sildugmesi').style.display='block'
        }
    }
</script>