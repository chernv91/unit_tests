<?php
/**
 * Обращение к вложенным массивам выглядит просто, только когда мы уверены в наличии всех ключей, попадающихся по пути:
 *
 * <?php
 *
 * $data = [
 * 'a' => [
 * 'b' => [
 * 'c' => 'wow'
 * ]
 * ]
 * ];
 *
 * $data['a']['b']['c']; // => wow
 * Если же наличие данных ключей в массиве не обязательно, тогда код резко усложняется. Каждая попытка обратиться
 * внутрь должна сопровождаться проверкой:
 *
 * <?php
 *
 * if (array_key_exists('a', $data)) {
 * $inner1 = $data['a'];
 * if (array_key_exists('b', $inner1)) {
 * $inner2 = $inner1['b'];
 * if (array_key_exists('c', $inner2)) {
 * // ...
 * }
 * }
 * }
 * Реализуйте функцию getIn, которая извлекает из массива (который может быть любой глубины вложенности) значение по
 * указанным ключам. Аргументы:
 *
 * Исходный массив Массив ключей, по которым ведется поиск значения В случае, когда добраться до значения невозможно,
 * возвращается null.
 *
 * <?php
 *
 * $data = [
 * 'user' => 'ubuntu',
 * 'hosts' => [
 * ['name' => 'web1'],
 * ['name' => 'web2']
 * ]
 * ];
 *
 * getIn($data, ['undefined']);        // => null
 * getIn($data, ['user']);             // => 'ubuntu'
 * getIn($data, ['user', 'ubuntu']);   // => null
 * getIn($data, ['hosts', 1, 'name']); // => 'web2'
 * getIn($data, ['hosts', 0]);         // => ['name' => 'web1']
 */

require_once 'Task02.php';

use PHPUnit\Framework\TestCase;

class getInTest extends TestCase
{
    /**
     * @dataProvider providerGetIn
     */
    public function testGetIn($arr, $keys, $expected): void
    {
        $this->assertEquals($expected, getIn($arr, $keys));
    }

    public function providerGetIn(): array
    {
        $data = [
            'user' => 'ubuntu',
            'hosts' => [
                ['name' => 'web1'],
                ['name' => 'web2'],
            ],
        ];

        return [

            [
                $data,
                ['undefined'],
                null,
            ],
            [
                $data,
                ['user'],
                'ubuntu',
            ],
            [
                $data,
                ['user', 'ubuntu'],
                null,
            ],
            [
                $data,
                ['hosts', 1, 'name'],
                'web2',
            ],
            [
                $data,
                ['hosts', 0],
                ['name' => 'web1'],
            ],

        ];
    }
}