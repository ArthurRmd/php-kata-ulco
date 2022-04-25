<?php

declare(strict_types=1);

namespace Ulco;

class Game
{

    public array $cardsPlayersOne = [];
    public array $cardsPlayersTwo = [];

    public function __construct()
    {
        $cards = [];
        for ($i = 2; $i <= 14; $i++) {
            $cards[] = new Card(Card::SIGN_CLUBS, $i);
            $cards[] = new Card(Card::SIGN_DIAMOND, $i);
            $cards[] = new Card(Card::SIGN_HEART, $i);
            $cards[] = new Card(Card::SIGN_SPADES, $i);
        }
        shuffle($cards);
        [$this->cardsPlayersOne, $this->cardsPlayersTwo] = array_chunk($cards, count($cards) / 2);

    }

    public function gameIsFinish() :bool
    {
        return count($this->cardsPlayersOne) === 0 || count($this->cardsPlayersTwo) === 0;
    }

    public function runRound() :void
    {
        /** @var Card $cardPlayerOne */
        $cardPlayerOne = array_pop($this->cardsPlayersOne);
        /** @var Card $cardPlayerTwo */
        $cardPlayerTwo = array_pop($this->cardsPlayersTwo);

        if ($cardPlayerOne->isBiggerThan($cardPlayerTwo)) {
            $this->cardsPlayersOne[] = $cardPlayerTwo;
            shuffle($this->cardsPlayersOne);
            return;
        }

        $this->cardPlayersTwo[] = $cardPlayerOne;
        shuffle($this->cardsPlayersTwo);

    }

}