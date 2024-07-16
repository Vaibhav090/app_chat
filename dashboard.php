<?php
include('./function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./partial/dashboard_head.php');
    ?>
</head>

<body>
    <?php
    include('./partial/header.php');
    ?>
    <div class="container">

        <div class="search-container">

            <div class="search-bar-container">

                <input type="search" name="keyword" class="form-control search-user-input" placeholder="Enter Name To Search" />
                <button type="submit" class="btn btn-primary "> <img src="./image/search.png" width="20" height="20" alt="search"></img></button>
            </div>
        </div>
        <div class="search-result"></div>

    </div>
    <?php
    include('./partial/footer.php');
    ?>
</body>

</html>