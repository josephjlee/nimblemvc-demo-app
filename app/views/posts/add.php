<?php require(APP_ROOT . '/views/includes/header.php'); ?>
            <a href="<?php echo(URL_ROOT) ?>/posts" class="btn btn-light"><i class="fa fa-angle-left"></i> Back</a>
            <div class="card card-body bg-light mt-5">
                <h2>Add Post</h2>
                <p>Create a new post</p>
                <form action="<?php echo(URL_ROOT) ?>/posts/add" method="post">
                    <div class="form-group">
                        <label for="title">Title: <sup>*</sup></label>
                        <input type="title" name="title" id="title" class="form-control form-control-lg <?php echo((!empty($data['title_err'])) ? 'is-invalid' : ''); ?>" value="<?php echo($data['title']); ?>">
                        <span class="invalid-feedback"><?php echo($data['title_err']); ?></span>
                    </div>

                    <div class="form-group">
                        <label for="body">Body: <sup>*</sup></label>
                        <textarea name="body" id="body" class="form-control form-control-lg <?php echo((!empty($data['body_err'])) ? 'is-invalid' : ''); ?>"><?php echo($data['body']); ?></textarea>
                        <span class="invalid-feedback"><?php echo($data['body_err']); ?></span>
                    </div>
                    <input type="submit" value="Save" class="btn btn-success">
                </form>
            </div>
<?php require(APP_ROOT . '/views/includes/footer.php'); ?>