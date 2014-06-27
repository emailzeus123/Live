
<div>
    <h3><?php echo empty($page->id) ? 'Add a new page' : 'Edit page ' . $page->title; ?></h3>
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
            <?php echo form_dropdown('parent_id',$pages_no_parents, $this->input->post('parent_id')? $this->input->post('parent_id') : $page->parent_id);?>
        </div>
        <div class="input-group">
            <span class="input-group-addon"></span>
            <input type="text" name="title" class="form-control" value="<?php echo set_value('title', $page->title); ?>" placeholder="Title" >
        </div>
        <div class="input-group">
            <span class="input-group-addon"></span>
            <input type="text" name="slug" class="form-control" value="<?php echo set_value('slug', $page->slug); ?>" placeholder="Slug">
        </div>
        <div class="input-group">
            <span class="input-group-addon"></span>
            <!--<input type="t" name="body" class="form-control" value="<?php //echo set_value('body', $page->body); ?>" placeholder="Body">-->
            <textarea rows="10" cols="20" name="body" class="tinycme form-control"  placeholder="Body"><?php echo set_value('body', $page->body); ?></textarea>
        </div>   
        

        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
    </form>    
</div>