<?php
/**
 * Class Random
 * Генерирует последовательность целых чисел случайной длины (в зависимости от коэффициента m).
 * Коэффициенты m, a и c также генерируются случайно, в соответствии с ограничениями, представленными
 * в формуле для линейного конгруэнтного метода.
 * При вызове метода getNext() возвращает очередное число последовательности.
 * При вызове метода reset() устанавливает указатель массива на его первый элемент.
 */

class Random
{
    private $x0;
    private $xNext;
    private const M = 10;
    private const A = 7;
    private const C = 7;

    public function __construct(int $seed)
    {
        if ($seed < 0) {
            throw new InvalidArgumentException('Начальное значение должно быть больше или равно 0!');
        }

        $this->x0 = $seed;
        $this->xNext = $seed;

    }

    public function getNext(): int
    {
        $this->xNext = (self::A * $this->xNext + self::C) % self::M;
        return $this->xNext;
    }

    public function reset(): void
    {
        $this->xNext = $this->x0;
    }
}



