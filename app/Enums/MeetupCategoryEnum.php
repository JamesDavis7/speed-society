<?php 

namespace App\Enums;

// always do enums as lowercase, just makes it easier to mess with them etc
enum MeetupCategoryEnum: string {
    case STATIC = 'static';
    case CRUISE = 'cruise';
    case CLUB = 'club';
}

// Recommended way to do enums.. translation file and get them from there
// <select>
// foreach(MeetupCategoryEnum::cases as $option) {
//     <option value="{{ $option->value }}">{{ trans('enums.meetup_category.' . $option->value) }}</option>
// }
// </select>

// lang/en/enums.php

// return [
//     'meetup_category' => [
//         'static' => 'Static (FE VALUE)',
//         'cruise' => 'Cruise',
//     ]
// ];