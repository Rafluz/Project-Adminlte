<?php
include "../../page/auth/connect.php";
if(isset($_GET['nama'])){
	$menu=$_GET['nama'];
}else{
	$menu='';
}
if(isset($_GET['urutan'])){
	$urutan=$_GET['urutan'];
}else{
	$urutan='';
}	
if(isset($_GET['id_induk'])){
	$id_induk=$_GET['id_induk'];
}else{
	$id_induk='';
}	
if(isset($_GET['link'])){
	$link=$_GET['link'];
}else{
	$link='';
}	
if(isset($_GET['target'])){
	$target=$_GET['target'];
}else{
	$target='';
}	
//echo "$menu $link $id_induk $urutan $target";
$sql = "INSERT INTO tbmenu (menu, urutan, id_induk, link, target) 
        VALUES ('$menu', '$urutan', '$id_induk', '$link', '$target')";
$simpan = $db->query($sql); 
if($simpan){
	echo "Data berhasil disimpan";
}else{
	echo "Data gagal disimpan";
}
?>