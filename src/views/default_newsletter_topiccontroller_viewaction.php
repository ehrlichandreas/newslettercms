<div class="default newsletter topic edit">
    <p>Thema bearbeiten</p>
    <form method="post" action="<?php echo $this->url($this->invokeParams, 'newsletter-topic-edit', true, true);?>" enctype="multipart/form-data">
        <p>
            <label for="name">Name:</label>
            <br />
            <input type="text" name="name" value="<?php echo $this->escape($this->topic['name']);?>" />
        </p>
        <p>
            <label for="title">Titel:</label>
            <br />
            <input type="text" name="title" value="<?php echo $this->escape($this->topic['title']);?>" />
        </p>
        <p>
            <label for="description">Beschreibung:</label>
            <br />
            <textarea name="description"><?php echo $this->escape($this->topic['description']);?></textarea>
        </p>
        <p>
            <input type="submit" value="speichern" />
        </p>
    </form>
    <div class="clr"></div>
</div>