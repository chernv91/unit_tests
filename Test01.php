<?php
/**
 * Реализуйте функцию takeOldest, которая принимает на вход список пользователей и возвращает самых взрослых.
 * Количество возвращаемых пользователей задается вторым параметром, который по-умолчанию равен единице.
 *
 * <?php
 * $users = [
 * ['name' => 'Tirion', 'birthday' => '1988-11-19'],
 * ['name' => 'Sam', 'birthday' => '1999-11-22'],
 * ['name' => 'Rob', 'birthday' => '1975-01-11'],
 * ['name' => 'Sansa', 'birthday' => '2001-03-20'],
 * ['name' => 'Tisha', 'birthday' => '1992-02-27']
 * ];
 *
 * takeOldest($users);
 * # => Array (
 * #   ['name' => 'Rob', 'birthday' => '1975-01-11']
 * # )
 */

require_once 'Task01.php';

use PHPUnit\Framework\TestCase;

class takeOldestTest extends TestCase
{
    /**
     * @dataProvider providerTakeOldest
     */
    public function testTakeOldest($users, $users_count, $expected): void
    {
        $this->assertEquals($expected, takeOldest($users, $users_count));
    }

    public function providerTakeOldest(): array
    {
        return [

            [
                [
                    ['name' => 'Tirion', 'birthday' => '1988-11-19'],
                    ['name' => 'Sam', 'birthday' => '1999-11-22'],
                    ['name' => 'Rob', 'birthday' => '1975-01-11'],
                    ['name' => 'Sansa', 'birthday' => '2001-03-20'],
                    ['name' => 'Tisha', 'birthday' => '1992-02-27'],
                ],
                1,
                ['name' => 'Rob', 'birthday' => '1975-01-11'],
            ],

        ];
    }
}

