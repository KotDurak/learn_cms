<?php

enum Rainbow
{
    case Red;
    case Orange;
    case Yellow;
    case Green;
    case Blue;
    case Indigo;
    case Violet;

    public function russian(): string
    {
        return match ($this) {
            static::Red => 'Красный',
            static::Orange => 'Оранженвый',
            static::Yellow => 'Желтый',
            static::Green => 'Зеленый',
            static::Blue => 'Голубой',
            static::Indigo  => 'Синий',
            static::Violet  => 'Фиолетовый'
        };
    }
}

enum Cars: string
{
    case Lada = 'Лада';
    case BMV = 'Бмв';
    case Merzedes = 'Мерс';
}


function printColor(Rainbow $color)
{
    echo $color->name;
}

function printCar(Cars $car)
{
    echo $car->name . '<br>' . $car->value;
}


foreach (Rainbow::cases() as $color) {
    echo $color->name .  ' ' . $color->russian() . '<br>';
}