<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Delicious Fruit | Dieter Schneider 2007 | www.csstemplateheaven.com</title>
<link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
</head>

<body>

<div id="container">

<div id="header">

<div id="header_left">
<h1>Delicious <span class="red">Fruit</span></h1>
<h2>Tastes like heaven</h2>
</div>

<div id="header_right">

<p class="welcome">Welcome, Guest. Please <a href="#">login</a> if you wish to edit content.</p>
<!-- <p class="welcome">Welcome, Guest. <a href="#">Logout?</a>.</p> -->

  <div class="formformat">
	
  </div>
</div>
  
</div>

<div id="left">

<h4><span class="menu_first_letter">Navigation</span></h4>

<div id="navcontainer">
<ul id="navlist">
<li id="active"><a href="#" id="current">Home</a></li>
<li class="green"><a href="#">Add Post</a></li>
<!-- <li class="green"><a href="#">Health</a></li>
<li><a href="#">Fruits</a></li>
<li><a href="#">Community</a></li>
<li><a href="#">About us </a></li> -->
</ul>
</div>

<!-- 
<h4>Contact us </h4>


  <form id="form2" method="post" class="contact_us" action="">
    <p><label>Name
    <input type="text" class="fields_contact_us" name="textfield" />
    </label>
    <label>E-mail
    <input type="text" class="fields_contact_us" name="textfield2" />
	</label>
	<label>
    Your message:
    <textarea name="textarea" cols="" rows=""></textarea>
	</label>
    <label>
    <input type="submit" class="submit_button_contact" name="Submit3" value="Submit" />
    </label></p>
  </form>
-->

<h4>Suggested links </h4>



<a href="http://www.csstemplateheaven.com">CssTemplateHeaven</a></div>

<div id="right">

<?php

$link = mysql_connect('localhost', 'root', null);
mysql_select_db('kohanadryrun', $link);
$query = "select * from posts order by dateposted desc";
$result = mysql_query($query, $link) or die(mysql_error());

while ($row = mysql_fetch_assoc($result))
{
    $date = getdate(strtotime($row['dateposted']));
    $month = substr($date['month'], 0, 3);
    $day = $date['mday'];
    $content = $row['content'];
    $title = $row['name'];
    $id = $row['id'];
?>

<div class="date_box">
<div class="date_box_month"><?php echo $month; ?></div>
<div class="date_box_day"><?php echo $day; ?></div>
</div>
<h3><a href="/viewpost?id=<?php echo $id; ?>"><?php echo $title; ?></a></h3>

    <div class="postcontent"><?php echo $content; ?></div>

  <p class="read_more"><a href="/viewpost?id=<?php echo $id; ?>"><img src="assets/images/arrow.png" alt="read more" width="16" height="12" />Further reading</a> </p>
<?php } ?>
  
</div>

<div id="footer">Created by: Dieter Schneider 2007 | <a href="http://www.csstemplateheaven.com">www.csstemplateheaven.com</a> </div>
</div>


</body>
</html>
