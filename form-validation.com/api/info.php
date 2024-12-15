<?php 

$_POST = json_decode(file_get_contents("php://input"), true);

$email = strval($_POST['email']);
$password = strval($_POST['password']);

$response = [  // json response
    'result' => true,
    'message' => '',
    'page' => ''
];

if (empty($email) && empty($password)) {
    $response['result'] = false;
    $response['message'] = 'Email and password are required.';
} elseif (empty($email)) {
    $response['result'] = false;
    $response['message'] = 'Email is required.';
} elseif (empty($password)) {
    $response['result'] = false;
    $response['message'] = 'Password is required.';
} elseif ($email == 'admin@gmail.com' && $password == 'rotha@123') {
    $response['result'] = true;
    $response['message'] = 'Login successfully.';
    // header('Location:/index.php'); khos hz, we must return in form of json and let js handle the redirect using using window.location
    $response['page'] = '/index.php';

} else {
    $response['result'] = false;
    $response['message'] = 'You entered the wrong email or password.';
}

// header('Content-Type: application/json');
echo json_encode($response);
?>

