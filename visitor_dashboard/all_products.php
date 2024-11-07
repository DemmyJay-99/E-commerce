<?php include_once 'config.php'; 
    include_once 'top_component.php'; 
?>

<!--Items Section-->
<section class="items_container">
<?php

$sql = "SELECT * FROM products";
$stmt = $conn->prepare($sql);
$stmt->execute();
$count = $stmt->rowCount();
$rows = $stmt->fetchAll();

foreach ($rows as $row){ ?>
    <div>
        <img src="<?php echo $row->image; ?>"/>
        <h3><?php echo $row->product_name; ?></h3>
        <h4><?php echo number_format($row->price); ?>
       </h4>
        <a href="product_detail.php?product_id=<?php echo $row->product_id; ?>"><button>Buy</button></a>
    </div>
<?php } ?>

</section>
    <!--End Items Section-->
    <?php include_once "./bottom_component.php"; ?>
