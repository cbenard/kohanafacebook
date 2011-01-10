<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kohana Demonstration - <?php echo Html::entities($title); ?></title>
<?php
    echo Html::style('assets/styles/style.css');
    echo Html::style('assets/styles/facebook.css');
    echo Html::script('assets/scripts/jquery-1.4.4.min.js');
    echo Html::script('assets/scripts/tiny_mce/jquery.tinymce.js');
    echo Html::script('assets/scripts/tiny_mce/tiny_mce.js');
?>
<script type="text/javascript">
$(document).ready(function() { $('.inputform textarea').tinymce(
{
    theme: "advanced",
    plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
    content_css: "<?php echo URL::site('assets/styles/style.css'); ?>",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote",
    theme_advanced_buttons2 : "undo,redo,|,link,unlink,anchor,image,cleanup,help,code,preview,|,forecolor,|,hr,fullscreen",
    theme_advanced_buttons3 : "",
    theme_advanced_buttons4 : "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true
}
);

$('.inputform input[type=text]').first().focus();
});
</script>

    <?php echo $opengraph; ?>
</head>

<body>

    <div id="fb-root"></div>
    <script type="text/javascript">
      window.fbAsyncInit = function() {
        FB.init({
          appId   : '<?php echo $facebook->getAppId(); ?>',
          session : <?php echo json_encode($session); ?>, // don't refetch the session when PHP already has it
          status  : true, // check login status
          cookie  : true, // enable cookies to allow the server to access the session
          xfbml   : true, // parse XFBML
          channelUrl: '<?php echo Url::site('channel.html', true); ?>'
        });

        // whenever the user logs in, we refresh the page
        FB.Event.subscribe('auth.login', function() {
          window.location.reload();
        });
      };

      (function() {
        var e = document.createElement('script');
        e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
        e.async = true;
        document.getElementById('fb-root').appendChild(e);
      }());
    </script>

<div id="container">

<div id="header">

<div id="header_left">
<h1>Delicious <span class="red">Fruit</span></h1>
<h2><?php echo Html::entities($title); ?></h2>
</div>

<div id="header_right">
<?php if ($me) { ?>
<p class="welcome">
    <img src="https://graph.facebook.com/<?php echo $uid; ?>/picture"
         class="signinpicture"/>
    Welcome, <?php
    echo $me['name'];
?>. <a href="<?php echo $facebook->getLogoutUrl(); ?>">Logout?</a>.</p>
<?php } else { ?>
<p class="welcome">
    <img src="https://graph.facebook.com/1/picture"
     class="signinpicture"/>
    Welcome, Guest. Please login if you wish to edit content.</p>
    <p class="welcome"><fb:login-button>Login with Facebook</fb:login-button></p>
<?php } ?>

  <div class="formformat">

  </div>
</div>

</div>

<div id="left">

<h4><span class="menu_first_letter">Navigation</span></h4>

<div id="navcontainer">
<ul id="navlist">
<li id="active"><a href="<?php
    echo Url::site();
?>" id="current">Home</a></li>
<?php if ($isAdmin) { ?>
<li class="green"><a href="<?php
echo Route::url('default', array(
    'controller' => 'admin',
    'action' => 'addpost'
));
?>">Add Post</a></li>
<?php } ?>
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
<!-- Begin Content -->
<?php echo $content; ?>
<!-- End Content -->

</div>

<div id="footer">Created by: Dieter Schneider 2007 | <a href="http://www.csstemplateheaven.com">www.csstemplateheaven.com</a> </div>
</div>


</body>
</html>
