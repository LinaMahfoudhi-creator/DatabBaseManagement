<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    include_once 'includes/AutoLoader.php';
    $studentRepository = new EtudiantRepository();
    $studentId = (int)$_GET['id'];
    var_dump($studentId);

    $updateData = [];

    if (!empty($_POST['name'])) {
        $updateData['name'] = $_POST['name'];
    }

    if (!empty($_POST['birthday'])) {
        $updateData['birthday'] = $_POST['birthday'];
    }

    if (!empty($_POST['section'])) {
        $updateData['section_id'] = (int)$_POST['section'];
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $updateData['image'] = file_get_contents($_FILES['image']['tmp_name']);
    }

    if (empty($updateData)) {
        header('Location: modifyEtudiant.php?id=' . $studentId . '&error=no_fields_sent');
        exit;
    }

    $studentRepository->update($studentId, $updateData);

    header('Location: etudiant.php?success=student_updated');
    exit;
} else {
    header('Location: login.php?error=invalid_request');
    exit;
}
