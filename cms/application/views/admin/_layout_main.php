<?php $this->load->view('admin/components/page_head'); ?>
    <body style="background: #555">

        <div class="navbar navbar-static-top navbar-inverse" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url('admin/dashboard'); ?>"><?php echo $meta_title ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                        <li><?php echo anchor('admin/pages', 'Pages'); ?></li>
                        <li><?php echo anchor('admin/users', 'Users'); ?></li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <div class="row">
                <!-- Main column -->
                <div class="span9">
                    <section>
                        <h2>Page name</h2>
                    </section>
                </div>
                <!-- Sidebar -->
                <div class="span3">
                    <section>
                        <?php echo mailto('emailzeus@yahoo.com', '<i class="icon-user"></i> emailzeus@yahoo.com'); ?><br>
                        <?php echo anchor('admon/user/logout','logout'); ?>
                    </section>
                </div>
            </div>
        </div>
        <h1>Hello, world!</h1>
<?php $this->load->view('admin/components/page_tail'); ?>