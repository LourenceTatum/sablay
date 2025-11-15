<?php
// FILE: cart_action.php - Nagha-handle ng Add to Cart function.

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
session_start(); 

$data = json_decode(file_get_contents("php://input"), true);
$action = $data['action'] ?? '';

$response = ['success' => false, 'message' => 'Invalid cart action or missing data.'];

// Initialize cart in session if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($action === 'add') {
    $item_id = $data['id'] ?? null;
    $name = $data['name'] ?? 'Unknown Item';
    $price = $data['price'] ?? 0;
    $qty = $data['qty'] ?? 1;

    // Tinitiyak na mayroon tayong ID at ito ay valid
    if ($item_id && is_numeric($price) && is_numeric($qty) && $qty > 0) {
        $price = (float)$price;
        $qty = (int)$qty;
        
        // Gumagamit ng item_id bilang key
        if (isset($_SESSION['cart'][$item_id])) {
            $_SESSION['cart'][$item_id]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$item_id] = [
                'id' => $item_id,
                'name' => $name,
                'price' => $price,
                'qty' => $qty
            ];
        }
        
        $response['success'] = true;
        $response['message'] = $name . ' added to cart.';
        // Maaari mo ring ipadala pabalik ang bagong cart data dito
        $response['cart_data'] = array_values($_SESSION['cart']); 
    } else {
        $response['message'] = 'Missing or invalid item details.';
    }
}

// Iba pang actions (remove, update, clear) ay pwedeng idagdag dito.

echo json_encode($response);
?>