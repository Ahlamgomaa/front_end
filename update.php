<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        
        $stmt = $pdo->prepare('UPDATE users SET id = ?, username = ?, password = ? WHERE id = ?');
        $stmt->execute([$id, $username, $password, $_GET['id']]);
        
        $msg = 'Updated Successfully!';
    }
    
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$user) {
        exit('User doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Update')?>

<div class="content update">
    <h2>Update User #<?=$user['id']?></h2>
    <form action="update.php?id=<?=$user['id']?>" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" placeholder="Enter ID" value="<?=$user['id']?>" id="id">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter username" value="<?=$user['username']?>" id="username">
        <label for="password">Password</label>
        <input type="text" name="password" placeholder="Enter your password" value="<?=$user['password']?>" id="password">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>