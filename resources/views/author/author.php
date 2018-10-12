<?php if (Session::has('success_message')) : ?>
    <div class="alert alert-success">
        <?= Session::get('success_message') ?>
    </div>
<?php endif; ?>

        <form action="" method="POST">
            <?= csrf_field() ?>
            <label>Name</label><br><input type="text" name="name" id="name" value="<?php echo htmlspecialchars($author['name'])?>"><br>
            <label>Date Of Birth</label><br><input type="text" name="code_of_video" id="code_of_video" value="<?php echo htmlspecialchars($author['date_of_birth'])?>"><br>
            <label>Biography</label><br><input type="text" name="author" id="author" value="<?php echo htmlspecialchars($author['biography'])?>"><br>
            <label>Photo</label><br><input type="text" name="description" id="description" value="<?php echo htmlspecialchars($author['photo'])?>"><br>
            <!-- <label></label><input type="text" name="url" id="url" value=""><br> -->
            <input type="submit" value="ADD">
 </form>
