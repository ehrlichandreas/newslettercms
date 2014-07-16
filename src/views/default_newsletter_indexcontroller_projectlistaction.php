<div class="default newsletter index projectlist">
    <p>Projekte</p>
    <ul>
<?php 
foreach ($this->projectList as $project)
{
    $urlOptions = array
    (
        'project_id'    => $project['project_id'],
    );
    
    $url = $this->url($urlOptions, 'newsletter-project', true, true);
?>
        <li><a href="<?php echo $url;?>"><?php echo $this->escape($project['title']);?></a></li>
<?php 
}
?>
    </ul>
    <div class="clr"></div>
    <p>neues Projekt anlegen</p>
    <form method="post" action="<?php echo $this->url(array(), 'newsletter-project', true, true);?>" enctype="multipart/form-data">
        <p>
            <label for="name">Name:</label>
            <br />
            <input type="text" name="name" value="" />
        </p>
        <p>
            <label for="title">Titel:</label>
            <br />
            <input type="text" name="title" value="" />
        </p>
        <p>
            <label for="description">Beschreibung:</label>
            <br />
            <textarea name="description"></textarea>
        </p>
        <p>
            <input type="submit" value="anlegen" />
        </p>
    </form>
    <div class="clr"></div>
</div>