<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['role'])) {
    header('Location: login.php');
    exit;
}
$title = "Students";
$css = 'includes/style.css';
include 'includes/AutoLoader.php';
include 'includes/header.php';
$detailEtudiant = new EtudiantRepository();
$etudiants = $detailEtudiant->findAll();
$sectionRepository = new SectionRepository();

foreach ($etudiants as $etudiant) {
    $ArrayEtudiants[] = new Etudiant($etudiant->student_id, $etudiant->name, $etudiant->birthday, $etudiant->image, $etudiant->section_id);
}
$_SESSION['etudiants'] = $ArrayEtudiants;
?>


<div class="header">
    Table des étudiants
</div>
<div class="container">
    <a href="addStudent.php" class="btn btn-pink btn-sm d-flex align-items-center">
        <i class="fas fa-user-plus me-2"></i>
    </a>
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
            <?php if (isset($_SESSION['etudiants'])) {
                foreach ($_SESSION['etudiants'] as $etudiant) : ?>
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
                                <?php
                                if ($_SESSION['role'] == "Admin") { ?>
                            </a>
                            <a href="deleteEtudiant.php?id=<?php echo $etudiant->student_id ?>" class="btn">
                                <i class="fas fa-eraser"></i>
                            </a>
                            <a href="modifyEtudiant.php?id=<?php echo $etudiant->student_id ?>" class="btn">
                                <i class="fas fa-edit"></i>
                            </a>
                        <?php } ?>
                        </td>
                    </tr>
            <?php endforeach;
            }
            ?>
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