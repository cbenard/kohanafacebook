<?php if (isset($errors) && count($errors)): ?>
<div class="fb5">
<?php foreach ($errors as $error): ?>
<li><?php echo $error; ?></li>
<?php endforeach; ?>
</div>
<?php endif; ?>

<?php
echo Form::open();

echo "<table class=\"inputform\">";
echo "<tr><td>";
echo Form::label('name', 'Title');
echo "</td><td>";
echo Form::input('name', $name, array('id' => 'name', 'class' => 'longinput'));
echo "</td></tr>";

echo "<tr><td>";
echo Form::label('content', 'Post Content');
echo "</td><td>";
echo Form::textarea('content', $content, array('id' => 'content'));
echo "</td></tr>";

echo "<tr><td></td><td>";
echo Form::submit(null, ($id) ? 'Edit Post' : 'Add Post',
        array('class' => 'submitbutton'));

echo Form::hidden('token', Security::token());

if ($id) {
    echo Form::hidden('id', $id);
    ?>
<p class="read_more"><a onclick="return confirm('You sure about that?');"
            href="<?php echo $deleteUrl; ?>"><img
            src="<?php echo Url::site('assets/images/arrow.png'); ?>"
            alt="read more" width="16" height="12" />delete post</a> </p>
<?php }

echo "</td></tr>";
echo "</table>";

echo Form::close();
?>