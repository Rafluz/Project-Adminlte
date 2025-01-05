<?php
include "../../auth/connect.php";

try {
    $sql = "SELECT * FROM tbmenu WHERE id_induk=0";
    $result = $db->query($sql);
    $options = '<option value="0">Menu Utama</option>';

    while ($mn = $result->fetch()) {
        $id_induk = $mn['id_menu'];
        $menu = htmlspecialchars($mn['menu']);
        $options .= "<option value='$id_induk'>$menu</option>";
    }
    echo $options;
} catch (PDOException $e) {
    http_response_code(500);
    echo "Error: " . $e->getMessage();
}
?>