<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (!empty($_POST)) {
    $id = isset($_POST['id']) ? $_POST['id'] : NULL;
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    $stmt = $pdo->prepare('INSERT INTO users (id, username, password) VALUES (?, ?, ?)');
    $stmt->execute([$id, $username, $password]);
    
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create')?>

<div class="content update">
    <h2>Create user</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label><br>
        <input type="text" name="id" placeholder="Enter ID" id="id">
        <label for="username">Username</label><br>
        <input type="text" name="username" placeholder="Enter username" id="username">
        <label for="password">Password</label><br>
        <input type="text" name="password" placeholder="Enter your password" id="password">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>