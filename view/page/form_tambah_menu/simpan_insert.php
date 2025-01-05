<?php
include "../auth/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$menu = htmlspecialchars($_POST['nama'] ?? '');
	$urutan = intval($_POST['urutan'] ?? 0);
	$id_induk = intval($_POST['id_induk'] ?? 0);
	$link = filter_var($_POST['link'] ?? '', FILTER_SANITIZE_URL);
	$target = htmlspecialchars($_POST['target'] ?? '');

	if ($menu && $urutan && $link && $target) {
		try {
			$stmt = $db->prepare("INSERT INTO tbmenu (menu, urutan, id_induk, link, target) VALUES (?, ?, ?, ?, ?)");
			$stmt->execute([$menu, $urutan, $id_induk, $link, $target]);
			$id_menu = $db->lastInsertId();

			$response = [
				'status' => 'success',
				'menu' => [
					'id_menu' => $id_menu,
					'menu' => $menu,
					'link' => $link,
				],
			];
			echo json_encode($response);
		} catch (PDOException $e) {
			http_response_code(500);
			echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
		}
	} else {
		http_response_code(400);
		echo json_encode(['status' => 'error', 'message' => 'Lengkapi semua kolom.']);
	}
} else {
	http_response_code(405);
	echo json_encode(['status' => 'error', 'message' => 'Metode tidak didukung.']);
}
?>