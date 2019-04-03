<?php

function takeOldest(array $users, int $users_count = 1): array
{
    $oldest = [];

    $birthdays = array_column($users, 'birthday');

    foreach ($birthdays as &$birthday) {
        $birthday = strtotime($birthday);
    }

    unset($birthday);
    asort($birthdays);

    $i = 0;

    foreach ($birthdays as $key => $value) {

        if ($i !== $users_count) {
            $i++;

            if ($users_count === 1) {
                $oldest = $users[$key];
            } else {
                $oldest[] = $users[$key];
            }

        } else {
            break;
        }

    }

    return $oldest;
}