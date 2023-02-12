<?php

require_once "db.php";

$id = $_GET["id"];

$sql = "SELECT * FROM ilanlar WHERE id = :id ";
$stmt = $conn->prepare($sql);    
$stmt->bindParam(':id', $id);  
$stmt->execute();

$ilanlar = $stmt->fetchAll(PDO::FETCH_ASSOC);
$ilan  = $ilanlar[0];

/*
echo "<b id='mavi' >İlan Başlık : </b>{$ilan['baslik']} <br>"; 
echo "<b id='kirmizi' >İlan Detay : </b>{$ilan['detay']} <br>";
echo "<b id='mavi' >İlan Sahibi No : </b>{$ilan['telefon']} <br>";
echo "<b id='kirmizi' >İlan Yükleme Tarihi : </b>{$ilan['tarih']} <br>";
*/

?>

<h1 style='color:red'><?php echo $ilan['baslik']; ?></h1>

<table border='1' cellpadding='10' cellspacing='0' width='500'>
    <tr>
        <th>İlan No</th>
        <td><?php echo $ilan['id'];?></td> 
    </tr>
    <tr>
        <th nowrap>İlan Tarihi</th>
        <td><?php echo date("d.m.Y", strtotime( $ilan['tarih'])); ?></td> 
    </tr>
    <tr>
        <th>Detay</th>
        <td><?php echo nl2br($ilan['detay']);?></td> 
    </tr>
    <tr>
        <th>Telefon</th>
        <td><?php echo $ilan['telefon'];?></td> 
    </tr>

    <tr>
        <th>Konum</th>
        <td><?php echo $ilan['konum'];?></td> 
    </tr>
</table>
<
<?php require_once "harita.php"; ?>


<style>

    #mavi{
        color: blue;
    }

    #kirmizi{
        color: red;
    }

</style>

<p> <a href='list.php'>LİSTEYE DÖN</a></p>
<p> <a href="update.php?id=<?php echo $id; ?> ">Güncelle</a></p>