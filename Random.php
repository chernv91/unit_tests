<?php
/**
 * Class Random
 * Генерирует последовательность целых чисел случайной длины (в зависимости от коэффициента m).
 * Коэффициенты m, a и c также генерируются случайно, в соответствии с ограничениями, представленными
 * в формуле для линейного конгруэнтного метода.
 * При вызове метода getNext() возвращает очередное число последовательности.
 * При вызове метода reset() устанавливает указатель массива на его первый элемент.
 */

class Random extends AbstractRandom
{
    private $randomNumbersSequence = [];

    public function __construct(int $seed)
    {
        if ($seed < 0) {
            throw new InvalidArgumentException('Начальное значение должно быть больше или равно 0!');
        }

        $this->randomNumbersSequence[] = $seed;
        $xn = $seed;
        $m = random_int($seed + 1, $seed * 2);
        $a = random_int(0, $m - 1);
        $c = random_int(0, $m - 1);

        for ($i = 0; $i < $m; $i++) {
            $xnNext = ($a * $xn + $c) % $m;
            $this->randomNumbersSequence[] = $xnNext;
            $xn = $xnNext;
        }

    }

    public function getNext(): int
    {
        return next($this->randomNumbersSequence);
    }

    public function reset(): void
    {
        reset($this->randomNumbersSequence);
    }
}



