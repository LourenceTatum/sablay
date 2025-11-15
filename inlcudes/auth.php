<?php
// FILE: auth.php - Nagha-handle ng User Login at Registration.

header('Content-Type: application/json');
// Ito ang nagpapasiguro na pwedeng makipag-usap ang JS sa PHP niyo (Cross-Origin Resource Sharing)
header("Access-Control-Allow-Origin: *"); 
session_start(); 

include 'db_connect.php'; 

$data = json_decode(file_get_contents("php://input"), true);
$action = $data['action'] ?? ''; 

$response = ['success' => false, 'message' => 'Invalid action.'];

if ($action === 'register') {
    $name = $conn->real_escape_string($data['name'] ?? '');
    $email = $conn->real_escape_string($data['email'] ?? '');
    $password = $data['password'] ?? '';
    $isAdmin = 0; 

    if (empty($name) || empty($email) || empty($password)) {
        $response['message'] = 'All fields are required.';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $response['message'] = 'Invalid email format.';
    } else {
        // I-check kung may email na
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $response['message'] = 'Email already exists.';
        } else {
            // I-hash ang password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (name, email, password, is_admin) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssi", $name, $email, $hashed_password, $isAdmin);

            if ($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = 'Registration successful! Please log in.';
            } else {
                $response['message'] = 'Registration failed: ' . $conn->error;
            }
        }
        $stmt->close();
    }
} 
elseif ($action === 'login') {
    $email = $conn->real_escape_string($data['email'] ?? '');
    $password = $data['password'] ?? '';

    $stmt = $conn->prepare("SELECT id, name, password, is_admin FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $response['success'] = true;
            $response['message'] = 'Login successful!';
            $response['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'is_admin' => $user['is_admin']
            ];
            
            // I-set ang session at cookies/local storage dito para sa PHP
            // Pero gagamitin natin ang JS Local Storage, kaya focus tayo sa response.
        } else {
            $response['message'] = 'Invalid email or password.';
        }
    } else {
        $response['message'] = 'Invalid email or password.';
    }
    $stmt->close();
}

$conn->close();
echo json_encode($response);
?>