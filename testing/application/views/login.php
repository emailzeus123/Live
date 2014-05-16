<h2>Login</h2>
<?php
if ($error == 1) {
    ?>
        <p>Username or Password is incorrect!</p>
    <?php
}
?>
<form method="post" action="<?= base_url() ?>index.php/users/login">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <select name="user_type">
        <option value="">--Select One--</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
        <option value="author">Author</option>
    </select><br>
    <input type="submit" name="submit" value="Submit">    
</form>