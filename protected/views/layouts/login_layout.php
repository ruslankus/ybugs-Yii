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
                <a class="navbar-brand" href="/<?php echo Yii::app()->language; ?>"><img src="/images/logo.svg" width="100px" height="40px" ></a>
            </div><!--/navbar-header -->
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-navbar-collapse">
                
               
                            
            <ul class="nav navbar-nav navbar-right">

                <?php $this->widget('application.widgets.LngMenu');?>
            
               
            </ul><!--/nav-bar -->
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<div id="main-container">
	<div class="container-fluid">
    	<div class="row">            
           
            <!--/ main content start here -->
             <?php echo $content;?>   
            <!--/ main content end here -->
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