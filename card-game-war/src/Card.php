<?php

namespace Ulco;

/*
 * Valet = 11
 * Reine = 12
 * Roi = 13
 * As = 14
 */

use JetBrains\PhpStorm\Pure;

class Card
{

    public const SIGN_DIAMOND = 'diamonds';
    public const SIGN_HEART = 'heart';
    public const SIGN_CLUBS = 'clubs';
    public const SIGN_SPADES = 'spades';


    private string $sign;

    // valeur de la carte
    private int $value;

    /**
     * @param  string  $sign
     * @param  int  $value
     */
    public function __construct(string $sign, int $value)
    {
        $this->sign = $sign;
        $this->value = $value;
    }


    #[Pure] public function isBiggerThan(Card $card) :bool
    {
        return $this->value > $card->getValue();
    }

    #[Pure] public function isEqual(Card $card) :bool
    {
        return $this->value === $card->getValue();
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }



}