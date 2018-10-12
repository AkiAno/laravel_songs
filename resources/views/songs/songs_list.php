<?php

?>

<div>
    <?php foreach($songs as $song):?>
        <ul>
            <li><?php echo $song->author;?> - <?php echo $song->name;?></li>
            
        </ul>

        <a href=<?php echo "http://www.songs.test:8080/songs/edit?id=".$song->id?>>EDIT</a>
        <form action="" method="POST">
        <?= csrf_field() ?>
            <input type="hidden" name="id" value=<?php echo $song->id?>>
            <input type="submit" value="delete">
        </form>
    <?php endforeach?>
</div>
