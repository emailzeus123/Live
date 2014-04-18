

<form action="<?php echo base_url().'index.php/posts/new_post';?> " method="POST">
Title <input name="title" type="text" value=""><br>
Post <textarea name="post" cols="25" rows="5"></textarea><br>
Active <input name="active" type="radio" value="1"> Not Active <input name="active"type="radio" value="0">
<input type="submit" name="submit" value="Submit">
</form>