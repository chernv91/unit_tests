<?php

/**
 * Class Circle
 * Класс для создания круга с неизменяемым радиусом
 * При необходимости рассчитывает площадь круга (метод getArea())
 * или длину окружности (метод getCircumference())
 */

class Circle
{
    private $radius;

    public function __construct(float $radius)
    {
        if ($radius <= 0) {
            throw new InvalidArgumentException('Радиус должен быть больше 0!');
        }

        $this->radius = $radius;
    }

    public function getArea(): float
    {
        return round(M_PI * $this->radius ** 2, 2);
    }

    public function getCircumference(): float
    {
        return round(2 * M_PI * $this->radius, 2);
    }
}