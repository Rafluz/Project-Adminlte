<?php
include "../../page/auth/connect.php";
if(isset($_GET['judul_post'])){
	$judul_post=$_GET['judul_post'];
}else{
	$judul_post='';
}
if(isset($_GET['isi_post'])){
	$isi_post=$_GET['isi_post'];
}else{
	$isi_post='';
}	
if(isset($_GET['tgl_post'])){
	$tgl_post=$_GET['tgl_post'];
}else{
	$tgl_post='';
}	
if(isset($_GET['id_katgori'])){
	$id_katgori=$_GET['id_katgori'];
}else{
	$id_katgori='';
}
//echo "$menu $link $id_induk $urutan $target";
$sql = "INSERT INTO tbpost (judul_post, isi_post, tgl_post, id_katgori) 
        VALUES ('$judul_post', '$isi_post', '$tgl_post', '$id_katgori')";
$simpan = $db->query($sql); 
if($simpan){
	echo "Data berhasil disimpan";
}else{
	echo "Data gagal disimpan";
}
?>