<!DOCTYPE html>
<html>
<head>
    <title>Simple MVC</title>
</head>
<body>
<h1>Write Something</h1>
<form action="" method="post">
    <div>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <textarea name="data" cols="30" rows="10"></textarea>
    </div>
    <div>
        <button type="submit">send</button>
    </div>
</form>

<div>
    <?php echo $data ?>
</div>        
</body>
</html>
