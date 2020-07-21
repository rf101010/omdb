<?php

include_once 'db_configuration.php';

if (isset($_POST['movie_id'])){

    $id = mysqli_real_escape_string($db, $_POST['movie_id']);
 

    unlink($file);

    $sql = "DELETE FROM movies
            WHERE movie_id = '$id'";

    mysqli_query($db, $sql);
    header('location: movies.php?movieDeleted=Success');
}//end if
?>
