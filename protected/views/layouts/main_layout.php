<?php /* @var $content string */ ?>
<?php /* @var $this Controller */ ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/style.css">
<title>Untitled Document</title>
</head>
<body>
<header>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="/images/logo.svg" width="100px" height="40px" ></a>
            </div><!--/navbar-header -->
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-navbar-collapse">
                
                <?php $this->widget('application.widgets.MainMenu');?>
                            
            <ul class="nav navbar-nav navbar-right">

                <?php $this->widget('application.widgets.LngMenu');?>
            
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user">&nbsp;</span>Hello Vasia <span class="caret"></span></a>
                
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Logout</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Setinngs</a></li>
                    </ul><!--/dropdown-menu -->
                </li><!--/dropdown -->
            </ul><!--/nav-bar -->
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<div id="main-container">
	<div class="container-fluid">
    	<div class="row">
            
        	<aside class="col-md-2 list-projects">
            	<h4>Your projects</h4>
                <ul>
                	<li><a href="#">Project 1</a></li>
                	<li class="active"><a href="#">Project 2</a></li>
                	<li><a href="#">Project 3</a></li>
                </ul>
            </aside>
            <div class="col-md-10" id="main-content-holder">
                
                <?php echo $content;?>
                
            </div><!--/main-content-holder -->
        </div>
    </div>
</div><!--/main-container -->
<footer>
	footer
</footer>
<script src="/js/jquery-1.9.0.min.js"></script>
<script src="/js/bootstrap.js"></script>
</body>
</html>

