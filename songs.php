
<?php

  $nav_selected = "MOVIES"; 
  $left_buttons = "YES"; 
  $left_selected = "MOVIES"; 

  include("./nav.php");
  global $db;

  ?>


<div class="right-content">
    <div class="container">

      <h3 style = "color: #01B0F1;">Songs -> Songs List</h3>

    <button><a class="btn btn-sm" href="create_movie.php">Create a Song</a></button>
       
<br>

        <table id="info" cellpadding="0" cellspacing="0" border="0"
            class="datatable table table-striped table-bordered datatable-style table-hover"
            width="100%" style="width: 100px;">
              <thead>
                <tr id="table-first-row">
                        <th>Song Id</th>
                        <th>Title</th>
                        <th>lyrics</th>
                      
                </tr>
              </thead>

              <tbody>

              <?php

$sql = "SELECT * from movies INNER JOIN movie_song INNER JOIN songs ON movies.movie_id = movie_song.movie_id AND songs.song_id = movie_song.song_id  ORDER BY songs.song_id ASC;";
$result = $db->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>
                                <td>'.$row["song_id"].'</td>
                                <td>'.$row["title"].' </span> </td>
                                <td>'.$row["lyrics"].'</span> </td>
                                
                                <td><a class="btn btn-info btn-sm" href="movie_info.php?movie_id='.$row["movie_id"].'">Display</a>
                                    <a class="btn btn-warning btn-sm" href="modify_movie.php?movie_id='.$row["movie_id"].'">Modify</a>
                                    <a class="btn btn-danger btn-sm" href="delete_movie.php?movie_id='.$row["movie_id"].'">Delete</a></td>          
                            </tr>';
                    }//end while
                }//end if
                else {
                    echo "0 results";
                }//end else

                 $result->close();
                ?>

              </tbody>
        </table>


        <script type="text/javascript" language="javascript">
    $(document).ready( function () {
        
        $('#info').DataTable( {
            dom: 'lfrtBip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ] }
        );

        $('#info thead tr').clone(true).appendTo( '#info thead' );
        $('#info thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    
        var table = $('#info').DataTable( {
            orderCellsTop: true,
            fixedHeader: true,
            retrieve: true
        } );
        
    } );

</script>

        

 <style>
   tfoot {
     display: table-header-group;
   }
 </style>

  <?php include("./footer.php"); ?>
