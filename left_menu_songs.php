<div id="menu-left">

<a href="songs_list.php">
  	<div <?php if($left_selected == "SONGS")
  	{ echo 'class="menu-left-current-page"'; } ?>>
  	<img src="./images/songs.png">
  	<br/>Songs<br/></div>
  </a>


  <a href="songs_movie_list.php">
  	<div <?php if($left_selected == "MOVIES")
  	{ echo 'class="menu-left-current-page"'; } ?>>
  	<img src="./images/movies.png">
  	<br/>Movies<br/></div>
  </a>

  <a href = "songs_people_list.php">
  	<div <?php if($left_selected == "PEOPLE")
  	{ echo 'class="menu-left-current-page"'; } ?>>
  	<img src="./images/people.png">
  	<br/>People<br/></div>
  </a>


  <a href = "songs_media.php">
  	<div <?php if($left_selected == "MEDIA")
  	{ echo 'class="menu-left-current-page"'; } ?>>
  	<img src="./images/media.png">
  	<br/>Media<br/></div>
  </a>


</div>
