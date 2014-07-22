<div class="default newsletter topic list">
    <p>Themen des Projekts</p>
    <ul>
<?php 
foreach ($this->topicRowset as $topic)
{
    $urlOptions = array
    (
        'project_id'    => $this->invokeParams['project_id'],
        'topic_id'      => $topic['topic_id'],
    );
    
    $url = $this->url($urlOptions, 'newsletter-topic-view', true, true);
?>
        <li><a href="<?php echo $url;?>"><?php echo $this->escape($topic['title']);?></a></li>
<?php 
}
?>
    </ul>
    <div class="clr"></div>
    <p>neues Thema anlegen</p>
    <form method="post" action="<?php echo $this->url($this->invokeParams, 'newsletter-topic-add', true, true);?>" enctype="multipart/form-data">
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