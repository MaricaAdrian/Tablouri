<span class="comanda">
<a href="javascript:;" onclick="insertText('<br />');">BR</a> &nbsp;&nbsp;
<a href="javascript:;" onclick="insertText('<b></b>');"><b>B</b></a> &nbsp;&nbsp;
<a href="javascript:;" onclick="insertText('<i></i>');"><i>I</i></a> &nbsp;&nbsp;
<a href="javascript:;" onclick="insertText('<p></p>');">P</a> &nbsp;&nbsp;
<a href="javascript:;" onclick="insertText('<h1></h1>');">H1</a> &nbsp;&nbsp;
<a href="javascript:;" onclick="insertText('<h2></h2>');">H2</a> &nbsp;&nbsp;
<a href="javascript:;" onclick="insertText('<h3></h3>');">H3</a> &nbsp;&nbsp;
<a href="javascript:;" onclick="insertText('<h4></h4>');">H4</a> &nbsp;&nbsp;
<a href="javascript:;" onclick="insertText('<h5></h5>');">H5</a> &nbsp;&nbsp;
<a href="javascript:;" onclick="insertText('<pre></pre>');">PRE</a> &nbsp;&nbsp;
<?php
$numepag = basename($_SERVER['PHP_SELF']);
if($numepag == "edit_posts.php" or $numepag == "insert_post.php" or $numepag == "insert_subpost.php"){echo "<div class=\"imagini\">";}?>
<a href="javascript:;" onclick='insertText("<img src=\"images/$img1\">");'/>IMG 1</a> &nbsp;&nbsp;
<a href="javascript:;" onclick='insertText("<img src=\"images/$img2\">");'/>IMG 2</a> &nbsp;&nbsp;
<a href="javascript:;" onclick='insertText("<img src=\"images/$img3\">");'/>IMG 3</a> &nbsp;&nbsp;
<a href="javascript:;" onclick='insertText("<img src=\"images/$img4\">");'/>IMG 4</a> &nbsp;&nbsp;
<a href="javascript:;" onclick='insertText("<img src=\"images/$img5\">");'/>IMG 5</a> &nbsp;&nbsp;
<a href="javascript:;" onclick='insertText("<img src=\"images/$img6\">");'/>IMG 6</a> &nbsp;&nbsp;
<a href="javascript:;" onclick='insertText("<img src=\"images/$img7\">");'/>IMG 7</a> &nbsp;&nbsp;
<a href="javascript:;" onclick='insertText("<img src=\"images/$img8\">");'/>IMG 8</a> &nbsp;&nbsp;
<a href="javascript:;" onclick='insertText("<img src=\"images/$img9\">");'/>IMG 9</a> &nbsp;&nbsp;
<a href="javascript:;" onclick='insertText("<img src=\"images/$img10\">");'/>IMG 10</a> &nbsp;&nbsp;
<a href="javascript:;" onclick='insertText("<img src=\"images/$img11\">");'/>IMG 11</a> &nbsp;&nbsp;
<a href="javascript:;" onclick='insertText("<img src=\"images/$img12\">");'/>IMG 12</a> &nbsp;&nbsp;
<a href="javascript:;" onclick='insertText("<img src=\"images/$img13\">");'/>IMG 13</a> &nbsp;&nbsp;
<a href="javascript:;" onclick='insertText("<img src=\"images/$img14\">");'/>IMG 14</a> &nbsp;&nbsp;
<a href="javascript:;" onclick='insertText("<img src=\"images/$img15\">");'/>IMG 15</a> &nbsp;&nbsp;
<?php
if($numepag == "edit_posts.php" or $numepag == "insert_post.php" or $numepag == "insert_subpost.php"){echo "</div>";}?>
</span>