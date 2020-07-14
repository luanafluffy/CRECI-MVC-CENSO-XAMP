<?php
$errors = [];

if(isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']); //limpar sessão
}elseif(isset($exception)) {
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];
    if(get_class($exception) === 'ValidationException') {
        $errors = $exception->getErrors();
    }
}
if(isset($message)){

    $alertType = '';
    if($message['type'] === 'error') {
        $alertType = 'danger';
    } else {
        $alertType = 'success';
    }
    
if($message){ ?>
    <div role="alert"
        class="my-3 alert alert-<?= $alertType ?>">
        <?= $message['message'] ?>
    </div>
<?php }
}