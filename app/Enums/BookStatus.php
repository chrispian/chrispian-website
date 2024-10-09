<?php

// app/Enums/BookStatus.php
namespace App\Enums;

enum BookStatus: string
{
    case Read = 'read';
    case Unread = 'unread';
    case Reading = 'reading';

    // Method to get labels
    public function label(): string
    {
        return match($this) {
            self::Read => 'Read',
            self::Unread => 'Unread',
            self::Reading => 'Currently Reading',
        };
    }
}
