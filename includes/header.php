<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>
        <?php
        if (isset($title)) {
            echo $title;
        } else {
            echo "PDO Manipulation";
        }
        ?>
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <?php
    if (isset($css)) {
        echo "<link rel='stylesheet' href='$css'>";
    } ?>


</head>

<body>
    <nav class="navbar">
        <div class="navbar-brand">Students Management System</div>
        <ul class="navbar-links">
            <li><a href="Home.php">Home</a></li>
            <li><a href="etudiant.php">Liste des étudiants</a></li>
            <li><a href="section.php">Liste des sections</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>