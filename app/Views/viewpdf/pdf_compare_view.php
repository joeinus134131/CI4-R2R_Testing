<?php foreach ($pdfs as $pdf) : ?>
    <iframe id="<?php echo $pdf['id']; ?>" src="<?php echo $pdf['url']; ?>" width="100%" height="600"></iframe>
<?php endforeach; ?>