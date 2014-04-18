

<form action="<?php echo base_url().'index.php/posts/update_post';?> " method="POST">
Title <input name="title" type="text" value="<?php echo $title ?>"><br>
Post <textarea name="post" cols="25" rows="5"><?php echo $post ?></textarea><br>
Active <input name="active" type="radio" value="1" checked="checked"> Not Active <input name="active"type="radio" value="0">
<input name="postID" type="hidden" value="<?php echo $postID ?>" >
<input type="submit" name="submit" value="Submit">
</form>