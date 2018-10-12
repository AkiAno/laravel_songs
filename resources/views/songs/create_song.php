<?php if (Session::has('success_message')) : ?>
    <div class="alert alert-success">
        <?= Session::get('success_message') ?>
    </div>
<?php endif; ?>

        <form action="" method="POST">
            <?= csrf_field() ?>
            <label>Name</label><br><input type="text" name="name" id="name" value="<?php echo htmlspecialchars($song['name'])?>"><br>
            <label>Code of video</label><br><input type="text" name="code_of_video" id="code_of_video" value="<?php echo htmlspecialchars($song['code_of_video'])?>"><br>
            <label>Author</label><br><input type="text" name="author" id="author" value="<?php echo htmlspecialchars($song['author'])?>"><br>
            <label>Description</label><br><input type="text" name="description" id="description" value="<?php echo htmlspecialchars($song['description'])?>"><br>
            <label>Released at</label><br><input type="date" name="released_at" id="released_at" value="<?php echo htmlspecialchars($song['released_at'])?>"><br>
            <!-- <label></label><input type="text" name="url" id="url" value=""><br> -->
            <input type="submit" value="ADD">
 </form>
