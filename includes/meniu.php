 <nav id="topnav" role="navigation">
          <div class="menu-toggle">Meniu</div>  
          <ul class="srt-menu" id="menu-main-navigation">
              <li class="current"><a href="index.php">Acasa</a></li>
              <li><a href="introducere.php">Introducere</a></li>
              <li><a href="#">Vectori</a>
                  <ul>
				  <?php require_once("includes/connect.php");
                        $query=mysql_query("select * from posts where post_category='Vectori'");
                        while($row=mysql_fetch_array($query)){
							
						$titlu = $row['post_title'];
						$id = $row['post_id'];
						$categorie = $row['post_category'];
						?>
                      <li><a href="pages.php?id=<?php echo $id; ?>&categorie=<?php echo $categorie ?>"><?php echo $titlu ?></a></li>
						<?php } ?>
                  </ul>
              </li>
              <li>
                  <a href="#">Matrici</a>
                  <ul>
				  <?php
				   $querys=mysql_query("select * from posts where post_category='Matrici'");
                        while($rows=mysql_fetch_array($querys)){
							
						$titlu = $rows['post_title'];
						$id = $rows['post_id'];
						$categorie = $rows['post_category'];
						?>
                      <li><a href="pages.php?id=<?php echo $id; ?>&categorie=<?php echo $categorie ?>"><?php echo $titlu ?></a></li>
						<?php } ?>
                  </ul>
              </li>
              <li>
                  <a href="contact.php">Ajutor&amp;Contact</a>
              </li>	
          </ul>     
		</nav>