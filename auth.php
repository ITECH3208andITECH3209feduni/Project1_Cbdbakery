<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'functions.php';

function loginAdmin($emailOrId, $password) {
    $conn = dbConnect();

    // Try to match from DB
    $stmt = $conn->prepare("SELECT * FROM staff WHERE email = ? OR id = ?");
    $stmt->bind_param("si", $emailOrId, $emailOrId);
    $stmt->execute();

    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin && isset($admin['password']) && password_verify($password, $admin['password'])) {
        $_SESSION['admin'] = [
            'id' => $admin['id'],
            'name' => $admin['name'],
            'role' => $admin['role']
        ];
        return true;
    }

    // Fallback login (Default)
    if (($emailOrId === 'admin' || $emailOrId === 'admin@example.com') && $password === 'Admin123') {
        $_SESSION['admin'] = [
            'id' => 0,
            'name' => 'Default Admin',
            'role' => 'admin'
        ];
        return true;
    }

    return false;
}
