<?php 
$navigationWidgetParam = array
(
    'module'        => 'default',
    'submodule'     => 'newsletter',
    'controller'    => 'index',
    'action'        => 'navigation',
);

$navigationContent = $this->widget($navigationWidgetParam);

$rightContent = '';

$dirPublic = dirname(dirname(__FILE__));

$cssFiles = array
(
    '/public/main.css',
);

foreach ($cssFiles as $key => $cssFile)
{
    $filepath = $dirPublic . $cssFile;
    
    if (file_exists($filepath) && is_readable($filepath))
    {
        $filetime = filemtime($filepath);
        
        $cssFiles[$key] = $cssFile . '?filetime=' . $filetime;
    }
    else
    {
        unset($cssFiles[$key]);
    }
}
?>
<html <?php echo 'xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"';?>>
<head>
<?php 
foreach ($cssFiles as $cssFile)
{
?>
    <link href="<?php echo $this->baseUrl() . $cssFile;?>" media="all" rel="stylesheet" type="text/css">
<?php 
}
?>
<?php #echo $headTitle; ?>
<?php #echo $headMeta; ?>
<?php #echo $headLink; ?>
<?php #echo $headScript; ?>
<?php #echo $headStyle; ?>
</head>
<body>
    <div id="wrapper">
        <div class="page_margins">
            <div class="page">
                <div id="main">
                    <!-- start: skip link navigation -->
                    <a class="skip" title="skip link" href="#navigation">Skip to the navigation</a>
                    <span class="hideme">.</span>
                    <a class="skip" title="skip link" href="#content">Skip to the content</a>
                    <span class="hideme">.</span>
                    <!-- end: skip link navigation -->
                    
                    <a id="content"></a>
                    <?php 
                    $class = array
                    (
                        'center',
                    );
                    
                    if (empty($navigationContent))
                    {
                        $class[] = 'noleft';
                    }
                    
                    if (empty($rightContent))
                    {
                        $class[] = 'noright';
                    }
                    
                    $class = implode(' ', $class);
                    
                    $class = trim($class);
                    
                    $class = 'class="'.$class.'"';
                    ?>
                    
                    <div id="center" <?php echo $class;?>>
                        <div id="header">
                            <div id="topnav"></div>
                            <div id="logo"></div>
                            <div id="banner"></div>
                        </div>
                        <div class="clr"></div>
                        <?php 
                        if (isset($this->mainnavigation))
                        {
                            echo $this->mainnavigation;
                        ?>
                        <div class="clr"></div>
                        <?php 
                        }
                        ?>
                        <div id="center_content">
                        <?php 
                            echo $this->maincontent;
                        ?>
                        </div>
                        <div class="clr"></div>
                    </div>
                    
                    <?php
                    if (isset($this->leftContent))
                    {
                        $class = '';
                        
                        if (!isset($this->rightContent))
                        {
                            $class = 'class="noright"';
                        }
                    ?>
                    <div id="left" <?php echo $class;?>>
                        <div id="left_content" class="clearfix">
                            <?php echo $this->leftContent; ?>
                        </div>
                        <div class="clr"></div>
                    </div>
                    <?php 
                    }
                    
                    if (isset($this->rightContent))
                    {
                        $class = '';
                        
                        if (!isset($this->leftContent))
                        {
                            $class = 'class="noleft"';
                        }
                    ?>
                    <div id="right" <?php echo $class;?>>
                        <div id="right_content" class="clearfix">
                            <?php echo $this->rightContent; ?>
                        </div>
                        <div class="clr"></div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </div>
</body>
</html>
