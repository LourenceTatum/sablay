<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once "db_connect.php";

$action = $_GET['action'] ?? '';

function response($success, $message = "", $data = null) {
    echo json_encode(["success" => $success, "message" => $message, "data" => $data]);
    exit();
}

/* ---------------------------------------
   GET PRODUCTS
----------------------------------------*/
if ($action === "getProducts") {
    $sql = "SELECT * FROM products ORDER BY id DESC";
    $result = $conn->query($sql);

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    response(true, "Products loaded successfully", $products);
}


/* ---------------------------------------
   REGISTER USER
----------------------------------------*/
if ($action === "register") {
    $data = json_decode(file_get_contents("php://input"), true);

    $name = $data['name'] ?? '';
    $email = $data['email'] ?? '';
    $password = $data['password'] ?? '';

    if (!$name || !$email || !$password) {
        response(false, "All fields are required");
    }

    // Check if email exists
    $check = $conn->query("SELECT id FROM users WHERE email='$email'");
    if ($check->num_rows > 0) {
        response(false, "Email already taken");
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password, user_type)
            VALUES ('$name', '$email', '$hashed', 'user')";

    if ($conn->query($sql)) {
        response(true, "Registration successful");
    } else {
        response(false, "Database error: " . $conn->error);
    }
}


/* ---------------------------------------
   LOGIN USER
----------------------------------------*/
if ($action === "login") {
    $data = json_decode(file_get_contents("php://input"), true);

    $email = $data['email'] ?? '';
    $password = $data['password'] ?? '';

    if (!$email || !$password) {
        response(false, "All fields are required");
    }

    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows === 0) {
        response(false, "Invalid email or password");
    }

    $user = $result->fetch_assoc();

    if (!password_verify($password, $user['password'])) {
        response(false, "Invalid email or password");
    }

    unset($user['password']); // Don't return the password hash

    response(true, "Login successful", $user);
}


/* ---------------------------------------
   INVALID ACTION
----------------------------------------*/
response(false, "Invalid API action: $action");
