<?php
include 'connection.php';
include('functions/userfunctions.php');
include 'authenticate.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S-Team</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include('header2.php'); ?>

    <section id="cart" class="section-p1">
        <div class="card card-body shadow text-align-center">
      
        <table class="table table-bordered table-striped">
    <thead>
    <div class="row align-items-center">
        <tr>
            <th class="center-text">ID</th>
            <th class="center-text">Tracking No.</th>
            <th class="center-text">Price</th>
            <th class="center-text">Date</th>
            <th class="center-text">View</th>
        </tr>
    </div>
    </thead>
    <tbody>
    <?php
    $orders = getOrders();
    if (mysqli_num_rows($orders) > 0) {
        while ($item = mysqli_fetch_assoc($orders)) {
            ?>
            <tr>
                <td class="center-text"><?= $item['id']; ?></td>
                <td class="center-text"><?= $item['tracking_no']; ?></td>
                <td class="center-text">₱<?= $item['total_price']; ?></td>
                <td class="center-text"><?= $item['created_at']; ?></td>
                <td class="center-text"><a class="btn btn-primary btn-sm" href="view-order.php?t=<?= $item['tracking_no']; ?>">View</a></td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="5" class="center-text">No Orders Yet</td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
        </div>
        
    </section>
    


    <script src="jquery-3.7.1.min.js"></script>
    <script src="script2.js"></script>
</body>

