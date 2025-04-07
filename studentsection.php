<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
$title = "Students";
include_once 'includes/AutoLoader.php';
$css = 'includes/style.css';
include_once 'includes/header.php';
$studentsection = new EtudiantRepository();

$sectionid = $_GET['id'];

$etudiants = $studentsection->findBySectionId($sectionid);
$sectionRepository = new SectionRepository();

foreach ($etudiants as $etudiant) {
    $ArrayEtudiants[] = new Etudiant($etudiant->student_id, $etudiant->name, $etudiant->birthday, $etudiant->image, $etudiant->section_id);
}
?>


<div class="header">
    Table des étudiants
</div>
<div class="container">
    <table id="studentTable" class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Birthday</th>
                <th scope="col">Section</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($ArrayEtudiants)) {
                foreach ($ArrayEtudiants as $etudiant) : ?>
                    <tr>
                        <th scope="row"><?php echo $etudiant->student_id ?></th>
                        <td>
                            <img src="data:image/jpeg;base64,<?= ($etudiant->image) ?>" alt="Image" class="img-fluid" width="50">
                        </td>
                        <td><?php echo $etudiant->name ?></td>
                        <td><?php echo $etudiant->birthday ?></td>
                        <td>
                            <?php
                            $section = $sectionRepository->findById($etudiant->section_id);
                            echo $section->designation;
                            ?>
                        <td>
                            <a href="detailEtudiant.php?id=<?php echo $etudiant->student_id ?>" class="btn">
                                <i class="fas fa-info-circle"></i>
                            </a>
                        </td>
                    </tr>
            <?php endforeach;
            } ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
<script>
    $(document).ready(function() {
        $('#studentTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ]
        });
    });
</script>
<?php
include_once "includes/footer.php";
?>