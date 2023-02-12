<h1>İlanları Listele</h1>

<?php
require_once "db.php";

$sql = "SELECT id,baslik,detay from ilanlar";
$stmt = $conn->prepare($sql);
$stmt->execute();
$ilanlarim = $stmt->fetchAll(PDO::FETCH_ASSOC);


foreach($ilanlarim as $ilan){
    echo "{$ilan['id']} : <b style='color:red;'> <a href='detail.php?id={$ilan['id']}'> {$ilan['baslik']} </b> </a> <br>  {$ilan['detay']} <br>" ;
    
}

?>


<p><a href='index.php'>ANASAYFAYA DÖN</a></p>

<!-- 
    <b> <a href="add.php">  Deneme </b></a>
    PHP'de HTML etiketlerinin kullanımı
-->
