<?php
include './header.php';
require_once "../../app/classes/VehicleManager.php";

$vehicleManager = new VehicleManager("", "", "", "");

$id = $_GET['id'] ?? null;
if ($id === null) {
    header("Location: ../index.php");
    exit;
}

$vehicles = $vehicleManager->getVehicles();
$vehicle = $vehicles[$id] ?? null;

if (!$vehicle) {
    header("Location: ../index.php");
    exit;
}
?>

<div class="container my-4">
    <h1>Vehicle Details:</h1>
    <div class="col-md-4">
        <div class="card">
            <img src="<?= htmlspecialchars($vehicle['image']) ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">Name:<?= htmlspecialchars($vehicle['name']) ?></h5> 
                <p class="card-text">Vehicle Type: <?= htmlspecialchars($vehicle['type']) ?></p>
                <p class="card-text">Price: $<?= number_format($vehicle['price'], 2) ?></p>
                <a href="../index.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
