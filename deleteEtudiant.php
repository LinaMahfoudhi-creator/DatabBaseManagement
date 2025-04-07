<?php
session_start();
if (!($_SESSION['role']) == 'Admin') {
    header('Location: login.php');
    exit;
}
include_once 'includes/AutoLoader.php';
$detailEtudiant = new EtudiantRepository();
$etudiant = $detailEtudiant->findById($_GET['id']);
$detailEtudiant->delete($etudiant->student_id);
header('Location: etudiant.php?page=etudiant&action=delete');
exit();
