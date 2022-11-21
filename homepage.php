<!DOCTYPE html>
<html lang="en">
<?php

include __DIR__ . "./model/Hotels.php";
include __DIR__ . "./templates/header.php";

?>
<body>
    <main>
        <div class="jumbotron jumbotron-fluid text-center bg-light d-flex align-items-center justify-content-center">
            <div class="container mt-5">
                <h1 class="mb-3">Our accommodations are for everyone</h1>
                <p class="mb-3">Compare our accommodation options!</p>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-lg-3 g-5 m-0">
            <? Hotel::getAllHotels(); ?>
        </div>
    </main>
</body>

</html>