<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
$title = "detailEtudiant";
$css = 'includes/style1.css';
include 'includes/AutoLoader.php';
include 'includes/header.php';

$detailEtudiant = new EtudiantRepository();
$etudiant = $detailEtudiant->findById($_GET['id']);
$etudiant = new Etudiant($etudiant->student_id, $etudiant->name, $etudiant->birthday, $etudiant->image, $etudiant->section_id);
$sectionRepository = new SectionRepository();
$section = $sectionRepository->findById($etudiant->section_id);


?>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id = <?php echo $etudiant->student_id ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"></th>
                <td>Name</td>
                <td><?php echo $etudiant->name ?></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Birthday</td>
                <td><?php echo $etudiant->birthday ?></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Section</td>
                <td><?php echo $section->designation ?></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Image</td>
                <td><img src="data:image/jpeg;base64,<?= ($etudiant->image) ?>" alt="Image" class="img-fluid" width="50"></td>
        </tbody>
    </table>
</div>

<?php
include_once "includes/footer.php";
?>