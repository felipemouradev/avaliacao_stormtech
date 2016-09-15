<?php
namespace App\Exceptions;

class SortingServiceException extends \Exception {
    public function errorMessage() {
        $errorMsg = 'Incorrect or null parameters';
        return (string) $errorMsg;
    }
}