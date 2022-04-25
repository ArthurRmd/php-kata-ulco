<?php

declare(strict_types=1);

namespace Ulco;

class Game
{

    public array $cardsPlayersOne = [];
    public array $cardsPlayersTwo = [];
    public array $temporaryCards = [];

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

    public function gameIsFinish(): bool
    {
        return count($this->cardsPlayersOne) === 0 || count($this->cardsPlayersTwo) === 0;
    }

    public function runRound(): void
    {
        /** @var Card $cardPlayerOne */
        $cardPlayerOne = array_pop($this->cardsPlayersOne);
        /** @var Card $cardPlayerTwo */
        $cardPlayerTwo = array_pop($this->cardsPlayersTwo);

        $this->startBattle($cardPlayerOne, $cardPlayerTwo);
    }

    public function startBattle(Card $cardPlayerOne, Card $cardPlayerTwo): void
    {
        $this->temporaryCards[] = $cardPlayerOne;
        $this->temporaryCards[] = $cardPlayerTwo;

        if ($cardPlayerOne->isEqual($cardPlayerTwo)) {
            $this->temporaryCards = array_merge($this->temporaryCards,[
                array_pop($this->cardsPlayersOne),
                array_pop($this->cardsPlayersOne),
                array_pop($this->cardsPlayersOne),
                array_pop($this->cardsPlayersTwo),
                array_pop($this->cardsPlayersTwo),
                array_pop($this->cardsPlayersTwo),
            ]);

            $this->runRound();
        }

        if ($cardPlayerOne->isBiggerThan($cardPlayerTwo)) {
            $this->cardsPlayersOne = array_merge($this->temporaryCards, $this->cardsPlayersOne);
            $this->temporaryCards = [];
            shuffle($this->cardsPlayersOne);
            return;
        }

        $this->cardsPlayersTwo = array_merge($this->temporaryCards, $this->cardsPlayersTwo);
        $this->temporaryCards = [];
        shuffle($this->cardsPlayersTwo);
    }

}