<?php
if(isset($message) || isset($exception)){
$errors = [];

if($exception) {
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];
    if(get_class($exception) === 'ValidationException') {
        $errors = $exception->getErrors();
    }
}

$alertType = '';

    if($message['type'] === 'error') {
        $alertType = 'danger';
    } else {
        $alertType = 'success';
    }
    
    if($message) { ?>
    <div role="alert"
        class="my-3 alert alert-<?= $alertType ?>">
        <?= $message['message'] ?>
    </div>
    <?php 
    }
}