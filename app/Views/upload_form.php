<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Multiple Images</title>
</head>
<body>

<h2>Upload Multiple Images in CodeIgniter 4</h2>

<?php if (session()->getFlashdata('message')): ?>
    <p style="color:green;"><?= session()->getFlashdata('message') ?></p>
<?php endif; ?>

<form action="<?= base_url('upload') ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="images[]" multiple="multiple" required><br><br>
    <button type="submit">Upload</button>
</form>

</body>
</html>
