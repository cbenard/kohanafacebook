<?php

foreach ($posts as $post)
{
    echo Request::factory("blog/viewindividual/{$post->id}")->execute();
?>

  <p class="read_more"><a href="<?php echo $post->url; ?>"><img src="assets/images/arrow.png" alt="read more" width="16" height="12" />Further reading</a> </p>
<?php } ?>