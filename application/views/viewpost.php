<?php
    echo Request::factory("blog/viewindividual/{$post->id}")->execute();

    if ($isAdmin): ?>
    <p class="read_more"><a href="<?php echo $post->editUrl; ?>"><img src="<?php echo Url::site('assets/images/arrow.png'); ?>" alt="read more" width="16" height="12" />edit post</a> </p>
    <?php endif; ?>

    <fb:share-button type="button_count" class="fbshare"></fb:share-button>
    <fb:comments xid="<?php echo "blogpost-id-".$post->id; ?>"></fb:comments>