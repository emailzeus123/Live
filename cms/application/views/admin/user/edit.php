
<div>
    <h3><?php echo empty($user->id) ? 'Add a new user' : 'Edit user ' . $user->name; ?></h3>
</div>
<div class="modal-body">
    <?php echo validation_errors(); ?>
</div>
<div class="container">
    <form class="form-signin" role="form" method="post" action="<?php echo $path ?>">
        <!--<h2 class="form-signin-heading">Edit</h2>-->
        <!--<input name="email" type="email" class="form-control" placeholder="Email Address" required="autofocus">-->

        <div class="input-group">
            <span class="input-group-addon"></span>
            <input type="text" name="name" class="form-control" value="<?php echo set_value('name', $user->name); ?>" placeholder="Name" >
        </div>
        <div class="input-group">
            <span class="input-group-addon"></span>
            <input type="text" name="email" class="form-control" value="<?php echo set_value('email', $user->email); ?>" placeholder="Email">
        </div>
        <div class="input-group">
            <span class="input-group-addon"></span>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="input-group">
            <span class="input-group-addon"></span>
            <input type="password" name="password_confirm" class="form-control" placeholder="Confirm password">
        </div>

        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
    </form>    
</div>