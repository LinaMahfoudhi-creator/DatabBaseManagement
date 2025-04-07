<?php
session_start();
if (!isset($_SESSION['role'])) {
    header('Location: login.php');
    exit;
}
$title = "Sections";
$css = 'includes/style.css';
include 'includes/AutoLoader.php';
include 'includes/header.php';
$sectionRepository = new SectionRepository();
$sections = $sectionRepository->findAll();

foreach ($sections as $section) {
    $ArraySections[] = new Section($section->section_id, $section->designation, $section->description);
}
$SESSION['sections'] = $ArraySections;
?>


<div class="header">
    Table des Sections
</div>
<div class="container">
    <table id="sectionsTable" class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Designation</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($SESSION['sections'])) {
                foreach ($SESSION['sections'] as $section) : ?>
                    <tr>
                        <th scope="row"><?php echo $section->section_id ?></th>
                        <td><?php echo $section->designation ?></td>
                        <td><?php echo $section->description ?></td>
                        <td>
                            <a href="studentsection.php?id=<?php echo $section->section_id ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-list-ol"></i>
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
        $('#sectionsTable').DataTable({
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