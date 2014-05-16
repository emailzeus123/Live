<?php
if ($this->session->userdata('userID')) {
    // echo 'data '.$this->session->userdata('userID').'<br>';
    ?>
    <p>You are login!</p>
    <p>User Type: <?= $this->session->userdata('user_type'); ?></p>
    <p><a href="<?= base_url() ?>index.php/users/logout">Logout</a></p>
    <p><a href="<?= base_url() ?>index.php/posts/new_post">New Post</a></p>
    <p><a href="<?= base_url() ?>index.php/users/register">Register User</a></p>
    <?php
} else {
    ?>    
    <p><a href="<?= base_url() ?>index.php/users/login">Login</a></p>
    <?php
}

//echo "<pre>"; print_r($posts); echo "</pre>"; 
foreach ($posts as $post) {

    echo "<h3>" . $post['title'];
    ?>
    - <a href="<?= base_url('index.php/posts/edit_post') ?>?postID=<?php echo $post['postID'] ?>&title=<?php echo $post['title'] ?>
         &post=<?php echo $post['post'] ?>">Edit</a> | 
    <a href="<?= base_url('index.php/posts/delete_post') ?>?postID=<?php echo $post['postID'] ?>">Delete</a>
    <?php
    echo "</h3>";
    echo $post['post'] . '<br>';
    echo '<a href="#">Read More</a><br>';
}

echo $pages;
?>