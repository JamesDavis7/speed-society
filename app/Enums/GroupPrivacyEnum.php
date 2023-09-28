<?php 

namespace App\Enums;

enum GroupPrivacyEnum: string {
    case PUBLIC = 'public';
    case PRIVATE = 'private';
    case HIDDEN = 'hidden';
}