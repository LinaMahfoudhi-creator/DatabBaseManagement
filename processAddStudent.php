<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once 'includes/AutoLoader.php';
    $studentRepository = new EtudiantRepository();

    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $sectionId = (int)$_POST['section'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
    } else {
        header('Location: addStudent.php?error=file_upload');
        exit;
    }
    $studentRepository->create([
        'name' => $name,
        'birthday' => $birthday,
        'section_id' => $sectionId,
        'image' => $imageData
    ]);
    header('Location: etudiant.php?success=student_added');
    exit;
} else {
    header('Location: addStudent.php?error=invalid_request');
}
