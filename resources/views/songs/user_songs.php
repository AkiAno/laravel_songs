<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
        <?php foreach($songs as $song):?>  
        <form action="" method="POST">
            <?= csrf_field() ?>
                  
                    <input type="hidden" name='id' value="<?php echo $song->id?>">
                    <input type="submit" value="<?php echo $song->name?>" name="">
                
        </form>
        <?php endforeach ?>
    <div>
        <?php if($id):?>
            <h2>Music Video</h2>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $cur_song->code_of_video?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <h2>Description</h2>
            <h3><?php echo $cur_song->description?></h3>
        <?php endif?>
    </div>
</body>
</html>