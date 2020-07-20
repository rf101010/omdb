<?php
$nav_selected = "PEOPLE";
$left_buttons = "YES";
$left_selected = "NO";

include("./nav.php");
require 'bin/functions.php';
require 'db_configuration.php';
global $db;
?>

<!-- =====================================================================================================
This page displays the information about people given a people_id.
The input is "people_id". 
This "people_id" is passed to people_info.php as a URL parameter.


This pages displays the people information in four sections.
[A] PEOPLE data 
[B] PEOPLE aggregation
[C] PEOPLE - Movies
[D] PEOPLE - Songs
The above three sections are outlined below





[B] PEOPLE aggegation
(display this as a table or name value pairs;
Do whatever is easier for you)
No of Movies as <role2>: 
No of Movies as <role2>: 
No of Movies as <role3>: 
No of Songs as Composer: 
No of Songs as Lyricist:
No of Songs as Music Director:



[C] PEOPLE - Movies
(display this as a table)
movie_id, native_name, english_name, year_made, role, screen_name



[D} PEOPLE - Songs
Display Type: Show this as a table
song_id
title 
lyrics (show first 30 characters)
role (from song_people)
===================================================================================================== -->

<?php
if (isset($_GET['people_id'])) {
  $people_id = mysqli_real_escape_string($db, $_GET['people_id']);
}
?>


<!-- ================ [A] Basic Data (table: people) ======================
--Completed by Jed

[A] PEOPLE data 
people_id
stage_name
first_name
middle_name
last_name
gender
image_name
========================================================================= -->

<div class="right-content">
  <div class="container">
    <h3 style="color: #02B0F2;">[A] People -> People Data</h3>

    <?php


    // query string for the Query A
    $sql_A2 = "SELECT people_id, stage_name, first_name, middle_name, last_name, gender, image_name
               FROM people 
               WHERE people_id =" . $people_id;

    if (!$sql_A2_result = $db->query($sql_A2)) {
      die('There was an error running query[' . $connection->error . ']');
    }

    if ($sql_A2_result->num_rows > 0) {
      $a2_tuple = $sql_A2_result->fetch_assoc();
      echo '<br> People ID : ' . $a2_tuple["people_id"] .
        '<br> Stage Name : ' . $a2_tuple["stage_name"] .
        '<br> First Name : ' . $a2_tuple["first_name"] .
        '<br> Middle Name :  ' . $a2_tuple["middle_name"].
        '<br> Last Name :  ' . $a2_tuple["last_name"].
        '<br> Gender :  ' . $a2_tuple["gender"].
        '<br> Image Name :  ' . $a2_tuple["image_name"];
    } //end if
    else {
      echo "0 results";
    } //end else

    $sql_A2_result->close();
    ?>
  </div>
</div>



<!-- ================ [B] ======================
[B] PEOPLE aggegation
(display this as a table or name value pairs;
Do whatever is easier for you)
No of Movies as <role2>: 
No of Movies as <role2>: 
No of Movies as <role3>: 
No of Songs as Composer: 
No of Songs as Lyricist:
No of Songs as Music Director:




========================================================================= -->
<div class="right-content">
  <div class="container">
    <h3 style="color: #02B0F2;">[B] People -> People Aggregation</h3>

    <?php

    $sql_B1 = "SELECT  COUNT(role) AS no_as_director FROM movie_people WHERE role LIKE'%Director%' AND people_id =" . $people_id;

   if (!$sql_B1_result = $db->query($sql_B1)) { 
     die('There was an error running query[' . $connection->error . ']');
    }

  if ($sql_B1_result->num_rows > 0) {
    $B1_tuple = $sql_B1_result->fetch_assoc();
      echo '<br> Number of Movies as Director : ' . $B1_tuple["no_as_director"];
  } //end if
  else {
    echo "0 results";
  } //end else

  $sql_B1_result->close(); 



  $sql_B2= "SELECT  COUNT(role) AS no_as_lead_actor FROM movie_people WHERE role LIKE'%Lead Actor%' AND people_id =" . $people_id;

   if (!$sql_B2_result = $db->query($sql_B2)) { 
     die('There was an error running query[' . $connection->error . ']');
    }

  if ($sql_B2_result->num_rows > 0) {
    $B2_tuple = $sql_B2_result->fetch_assoc();
      echo '<br> Number of Movies as Lead Actor : ' . $B2_tuple["no_as_lead_actor"];
      
  } //end if
  else {
    echo "0 results";
  } //end else

  $sql_B2_result->close(); 



  $sql_B3= "SELECT  COUNT(role) AS no_as_lead_actress FROM movie_people WHERE role LIKE'%Lead Actress%' AND people_id =" . $people_id;

  if (!$sql_B3_result = $db->query($sql_B3)) { 
    die('There was an error running query[' . $connection->error . ']');
   }

 if ($sql_B3_result->num_rows > 0) {
   $B3_tuple = $sql_B3_result->fetch_assoc();
     echo '<br> Number of Movies as Lead Actress : ' . $B3_tuple["no_as_lead_actress"];
    
 } //end if
 else {
   echo "0 results";
 } //end else

 $sql_B3_result->close(); 



 $sql_B4= "SELECT  COUNT(song_id) AS no_as_composer FROM song_people WHERE role LIKE'%Composer%' AND people_id =" . $people_id;

 if (!$sql_B4_result = $db->query($sql_B4)) { 
   die('There was an error running query[' . $connection->error . ']');
  }

if ($sql_B4_result->num_rows > 0) {
  $B4_tuple = $sql_B4_result->fetch_assoc();
    echo '<br> Number of Songs as Composer : ' . $B4_tuple["no_as_composer"];
   
} //end if
else {
  echo "0 results";
} //end else

$sql_B4_result->close(); 



$sql_B5= "SELECT  COUNT(song_id) AS no_as_lyricist FROM song_people WHERE role LIKE'%Lyricist%' AND people_id =" . $people_id;

if (!$sql_B5_result = $db->query($sql_B5)) { 
  die('There was an error running query[' . $connection->error . ']');
 }

if ($sql_B5_result->num_rows > 0) {
 $B5_tuple = $sql_B5_result->fetch_assoc();
   echo '<br> Number of Songs as Lyricist : ' . $B5_tuple["no_as_lyricist"];
} //end if
else {
 echo "0 results";
} //end else

$sql_B5_result->close(); 



$sql_B6= "SELECT  COUNT(song_id) AS no_as_music_dir FROM song_people WHERE role LIKE'%Music Director%' AND people_id =" . $people_id;

if (!$sql_B6_result = $db->query($sql_B6)) { 
  die('There was an error running query[' . $connection->error . ']');
 }

if ($sql_B6_result->num_rows > 0) {
 $B6_tuple = $sql_B6_result->fetch_assoc();
   echo '<br> Number of Songs as Music Director : ' . $B6_tuple["no_as_music_dir"];
} //end if
else {
 echo "0 results";
} //end else

$sql_B6_result->close(); 





    ?>

  </div>
</div>


<!-- ================ [C] ======================
[C] PEOPLE - Movies
(display this as a table)
movie_id, native_name, english_name, year_made, role, screen_name


========================================================================= -->

<div class="right-content">
  <div class="container">
    <h3 style="color: #02B0F2;">[C] People -> Movies</h3>


    <table class="display" id="movie_people_table" style="width:100%">
      <div class="table responsive">

        <thead>
          <tr>
            <th> Movie ID </th>
            <th> Native Name</th>
            <th> English Name</th>
            <th> Year Made</th>
            <th> Role</th>
            <th> Screen Name</th>
            
          </tr>
        </thead>

        <?php

        // query string for the Query
        $sql_C1 = "SELECT movie_people.movie_id AS movie_ID, native_name, english_name, year_made, role, screen_name
                  FROM movies inner JOIN movie_people ON movies.movie_id = movie_people.movie_id
                  WHERE people_id =" . $people_id;

        if (!$sql_C1_result = $db->query($sql_C1)) {
          die('There was an error running query[' . $connection->error . ']');
        }

        // this is 2 to many relationship
        // So, many tuples may be returned
        // We will display those in a table in a while loop
        if ($sql_C1_result->num_rows > 0) {
          // output data of each row
          while ($C1_tuple = $sql_C1_result->fetch_assoc()) {
            echo '<tr>
                      <td>' . $C1_tuple["movie_ID"] . '</td>
                      <td>' . $C1_tuple["native_name"] . '</td>
                      <td>' . $C1_tuple["english_name"] . '</td>
                      <td>' . $C1_tuple["year_made"] . '</td>
                      <td>' . $C1_tuple["role"] . '</td>
                      <td>' . $C1_tuple["screen_name"] . ' </span> </td>
                  </tr>';
          } //end while

        } //end second if 

        $sql_C1_result->close();
        ?>

    </table>
  </div>
</div>



<!-- ================ [D] ======================

[D} PEOPLE - Songs
Display Type: Show this as a table
song_id
title 
lyrics (show first 30 characters)
role (from song_people)

========================================================================= -->

<div class="right-content">
  <div class="container">
    <h3 style="color: #02B0F2;">[D] People-> Songs </h3>

    <table class="display" id="keywords_table" style="width:100%">
      <div class="table responsive">

        <thead>
          <tr>
            <th> Song ID </th>
            <th> Title </th>
            <th> Lyrics </th>
            <th> Role </th>
            
          </tr>
        </thead>

        <?php

        // query string for the Query 
        $sql_D1 = "SELECT songs.song_id AS song_ID, title, lyrics, song_people.role
                    FROM songs INNER JOIN song_people on songs.song_id = song_people.song_id
                    INNER JOIN people ON song_people.people_id = people.people_id
                    WHERE people.people_id=" . $people_id;

        // echo $sql_A4;

        if (!$sql_D1_result = $db->query($sql_D1)) {
          die('There was an error running query[' . $db->error . ']');
        }

        // this is 2 to many relationship
        // So, many tuples may be returned
        // We will display those in a table in a while loop
        if ($sql_D1_result->num_rows > 0) {
          // output data of each row
          while ($D1_tuple = $sql_D1_result->fetch_assoc()) {
            echo '<tr>
                      <td>' . $D1_tuple["song_ID"] . '</td>
                      <td>' . $D1_tuple["title"] . '</td>
                      <td>' . substr($D1_tuple["lyrics"],0,30) . '</td>
                      <td>' . $D1_tuple["role"] . ' </td>
                  </tr>';
          } //end while

        } //end second if 

        $sql_D1_result->close();
        ?>

    </table>
  </div>
</div>




<!-- ================== JQuery Data Table script ================================= -->

<script type="text/javascript" language="javascript">
  $(document).ready(function() {

    $('#info').DataTable({
      dom: 'lfrtBip',
      buttons: [
        'copy', 'excel', 'csv', 'pdf'
      ]
    });

    $('#info thead tr').clone(true).appendTo('#info thead');
    $('#info thead tr:eq(2) th').each(function(i) {
      var title = $(this).text();
      $(this).html('<input type="text" placeholder="Search ' + title + '" />');

      $('input', this).on('keyup change', function() {
        if (table.column(i).search() !== this.value) {
          table
            .column(i)
            .search(this.value)
            .draw();
        }
      });
    });

    var table = $('#info').DataTable({
      orderCellsTop: true,
      fixedHeader: true,
      retrieve: true
    });

  });
</script>



<style>
  tfoot {
    display: table-header-group;
  }
</style>

<?php include("./footer.php"); ?>