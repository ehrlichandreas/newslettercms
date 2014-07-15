<?php 
$navigationWidgetParam = array
(
    'module'        => 'default',
    'submodule'     => 'newsletter',
    'controller'    => 'index',
    'action'        => 'navigation',
);

$navigationContent = $this->widget($navigationWidgetParam);

?>
<html <?php echo 'xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"';?>>
<head>
<?php #echo $headTitle; ?>
<?php #echo $headMeta; ?>
<?php #echo $headLink; ?>
<?php #echo $headScript; ?>
<?php #echo $headStyle; ?>
</head>
<body>
<div id="wrapper"> 
  <!--HEADER START--> 
  <div id="header"> 
    <div id="topline"> 
      <div class="floatLeft" ><?php echo$navigationContent;?></div>
      <div class="floatRight" ></div> 
    </div> 
    <div id="logo">logo goes here</div>
<?php echo $this->mainnavigation;?>
  </div> 
  <!--HEADER END--> 
  <!--MAIN CONTENT START-->
  <div id="mainContent"> 
<?php echo $this->maincontent;?>
  </div>
  <!--MAIN CONTENT END--> 
<?php echo $this->mainfooter;?>
</div>
</body>
</html>
