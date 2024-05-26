<?php
include('database.php');
session_start();

$q = "SELECT * FROM `msg`";
if ($rq = mysqli_query($conn, $q)) {
    if (mysqli_num_rows($rq) > 0) {
        while ($row = mysqli_fetch_assoc($rq)) {
            if ($row["phone"] == $_SESSION["phone"]) {
?>
                <p class="sender">
                    <span><?= $row["phone"] ?></span>
                    <?= $row["msg"] ?>
                    <span><?= $row["date"] ?></span>
                </p>

            <?php
            } else {
            ?>
                <p>
                    <span><?= $row["phone"] ?></span>
                    <?= $row["msg"] ?>
                    <span><?= $row["date"] ?></span>
                </p>
                    

<?php
            }
        }
    } else {
        echo "<h3> Chat is empty at this moment</h3>";
    }
}


?>