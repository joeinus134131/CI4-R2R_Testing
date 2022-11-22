<form action="file-upload.php" method="post" enctype="multipart/form-data">
    Send this directory:<br />
    <input name="userfile[]" type="file" webkitdirectory multiple />
    <input type="submit" value="Send files" />
</form>