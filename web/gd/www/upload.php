<?php
?>
<div>
    <h1>Upload</h1>
    <br>
    <form method="post" action="uploadf.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="fname">Filename</label>
            <input type="text" name="fname" id="fname">
        </div>
        <div class="form-group">
            <input type="file" name="file">
        </div>
        <button name="upload" type="summit" class="btn btn-primary">Upload</button>
    </form>
</div>
<?php
?>