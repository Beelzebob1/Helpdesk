<?php include 'nav.php';?>
<?php
if (isset($_POST['edit'])) {
    $userId = $_POST['user_id'];
    $field = $_POST['field'];
    $newValue = $_POST['new_value'];

    $updateSql = "UPDATE users SET $field = :value WHERE id = :id";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bindParam(':value', $newValue);
    $updateStmt->bindParam(':id', $userId);
    $updateStmt->execute();

    header("Location: ".$_SERVER['REQUEST_URI']);
    exit();
}

function getEditableField($fieldName, $userId, $value) {
    return '<form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
                <input type="hidden" name="field" value="' . $fieldName . '">
                <input type="hidden" name="user_id" value="' . $userId . '">
                <input type="text" name="new_value" value="' . $value . '">
                <button class="edit" type="submit" name="edit">Edit</button>
            </form>';            
}

?>
<div class="overzicht_a">
    <div class="medewerkers">
        <h1>Edit</h1>
        <form method="POST" action="php/verwijderen.php">
        <table>
            <tr>
                <th>Naam</th>
                <th>E-mail</th>
                <th>Wachtwoord</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM users";
            $stmt = $conn->query($sql);
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($users as $user) {
                echo '<tr>';
                echo '<td>' . getEditableField('name', $user['id'], $user['name']) . '</td>';
                echo '<td>' . getEditableField('email', $user['id'], $user['email']) . '</td>';
                echo '<td>' . getEditableField('password', $user['id'], $user['password']) . '</td>';
                echo '<td>' . getEditableField('status', $user['id'], $user['status']) . '</td>';
                echo '<td>
                            <input type="hidden" name="delete" value="' . $user['id'] . '">
                            <button class="delete" type="post" action="php/verwijderen.php" value="delete" name="delete">Delete</button>
                            </td>';
                echo        '</form>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
    
    <div class="gebruikers">
    <table>
        <tr>
            <h1>Users</h1>
            <th>Name</th>
            <th>E-mail</th>
            <th>Username</th>
            <th>Password</th>
            <th>Status</th>
        </tr>
        <?php
        $sql = "SELECT * FROM users";
        $stmt = $conn->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            echo '<tr>';
            echo '<td>' . $user['name'] . '</td>';
            echo '<td>' . $user['email'] . '</td>';
            echo '<td>' . $user['username'] . '</td>';
            echo '<td>' . $user['password'] . '</td>';
            echo '<td>' . $user['status'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    </div>
        <div class="tvgn">
            <h1>Toevoegen</h1>
        <form action="php/toevoegen.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="email" placeholder="E-mail" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="password" placeholder="Password" required>
            <input type="text" name="status" placeholder="Status" required>
            <button type="submit" class="insert">Insert</button>
        </form>
    </div>
</div>
