<div class="default newsletter project edit">
    <p>Projekt bearbeiten</p>
    <form method="post" action="<?php echo $this->url(array('project_id'=>$this->project['project_id']), 'newsletter-project-edit', true, true);?>" enctype="multipart/form-data">
        <p>
            <label for="name">Name:</label>
            <br />
            <input type="text" name="name" value="<?php echo $this->escape($this->project['name']);?>" />
        </p>
        <p>
            <label for="title">Titel:</label>
            <br />
            <input type="text" name="title" value="<?php echo $this->escape($this->project['title']);?>" />
        </p>
        <p>
            <label for="description">Beschreibung:</label>
            <br />
            <textarea name="description"><?php echo $this->escape($this->project['description']);?></textarea>
        </p>
        <p>
            <input type="submit" value="speichern" />
        </p>
    </form>
    <div class="clr"></div>
</div>