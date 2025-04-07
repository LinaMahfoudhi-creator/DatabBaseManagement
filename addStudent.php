<?php
$title = "Add Student";
$css = 'includes/addstudent.css';
include_once "includes/AutoLoader.php";
include_once "includes/header.php";
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'Admin') {
    header('Location: login.php');
    exit;
}
$repo = new EtudiantRepository();
?>
<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="text-center mb-4 text-pink">Add Student</h2>
        <form action="processAddStudent.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter student name" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Student Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Birthday</label>
                <input type="date" name="birthday" id="birthday" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="section" class="form-label">Section</label>
                <select name="section" id="section" class="form-control" required>
                    <option value="" disabled selected>Select a section</option>
                    <option value="1">GL</option>
                    <option value="2">RT</option>
                    <option value="3">IIA</option>
                    <option value="4">IMI</option>

                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-pink">Add Student</button>
            </div>

        </form>
    </div>
</div>