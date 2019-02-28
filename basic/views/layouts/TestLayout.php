<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>template header</h1>

<?php if(isset($this->blocks['block1'])):?>
<?=$this->blocks['block1']; ?>
<?php else:?>
    <h1>this is template default content </h1>
    <?php endif;?>
<?= $content;?>
<h1>template footer</h1>
</body>
</html>