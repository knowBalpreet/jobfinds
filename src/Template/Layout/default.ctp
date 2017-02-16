<!DOCTYPE html>
<html>
<head>
	 	<?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?=  $this->assign('title', $title) ?>
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('kickstart.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('kickstart.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
<div class="grid" id="container">
    <header>
        <div class="col_4 column">
            <h1><a href="<?php echo $this->request->webroot; ?>"><strong>Job</strong>Finds</a></h1>
        </div>
        <div class="col_6 column right welcome" style="padding-top: 15px">
            <?php  if ($this->request->session()->read('Auth.User')) { ?>
                <h6>Welcome <strong><?php echo $this->request->session()->read('Auth.User')['username']; ?></strong></h6>
            <?php   }   ?>
        </div>
        <div class="col_2 column right">
            <form id="add_job_link" action="<?php echo $this->request->webroot;?>jobs/add">
                <button class="large green"><i class="fa fa-plus"></i> Add Job </button>
            </form>
        </div>
        <div class="col_12 column">
            <ul class="menu">
                <li <?php echo ($this->request->here == '/projects/PHP/MVC-CakePhp/Project1-JobFinds/' || $this->request->here == '/projects/PHP/MVC-CakePhp/Project1-JobFinds/jobs')? 'class="current"' : ''?>><a href="<?php echo $this->request->webroot;?>"><i class="fa fa-home"></i> Home</a></li>

                <li <?php echo ($this->request->here == '/projects/PHP/MVC-CakePhp/Project1-JobFinds/jobs/browse')? 'class="current"' : ''?>><a href="<?php echo $this->request->webroot;?>jobs/browse"><i class="fa fa-desktop"></i> Browse Jobs</a></li>
                <?php if ($this->request->session()->read('Auth.User')) { ?>

                <li class="right"><a href="<?php echo $this->request->webroot;?>users/logout"><i class="fa fa-user"></i> Logout</a></li>
                
                <?php }else{ ?>
                <li <?php echo ($this->request->here == '/projects/PHP/MVC-CakePhp/Project1-JobFinds/users/register')? 'class="current"' : ''?>><a href="<?php echo $this->request->webroot;?>users/register"><i class="fa fa-user"></i> Register</a></li>
                <li <?php echo ($this->request->here == '/projects/PHP/MVC-CakePhp/Project1-JobFinds/users/login')? 'class="current"' : ''?>><a href="<?php echo $this->request->webroot;?>users/login"><i class="fa fa-key"></i> Login</a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="col_12 column">
        	<?php	
            echo $this->Flash->render();
        		?>
        	<?php echo $this->fetch('content'); 	?>
        </div>
        <div class="clearfix"></div>
        <footer>
            <p>Copyright &copy; 2016, JobFinds.All Rights Reserved</p>
        </footer>
    </header>
</div> <!-- End Grid -->
</body>
</html>
