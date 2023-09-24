<?php 

namespace app\Enums;

class MeetupCategoryEnum {
    const STATIC = 'Static';
    const CRUISE = 'Cruise';
    const CLUB = 'Club';

    public static function getCategories(): array {
        return [
            self::STATIC,
            self::CRUISE,
            self::CLUB,
        ];
    }
}
