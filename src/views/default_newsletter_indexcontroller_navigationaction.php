<div class="default newsletter index navigation">
    <h2><?php echo $this->escape('Navigation');?></h2>
    <div class="clr"></div>
    <ul>
        <li><a href="<?php echo $this->url(array(), 'newsletter-project-list', true, true);?>"><?php echo $this->escape('Projekte');?></a></li>
        <?php 
        if (isset($this->invokeParams) && isset($this->invokeParams['project_id']) && $this->invokeParams['project_id'] > 0)
        {
        ?>
        <li><a href="<?php echo $this->url($this->invokeParams, 'newsletter-topic-list', true, true);?>"><?php echo $this->escape('Themen');?></a></li>
        <?php 
        }
        ?>
    </ul>
</div>
