<?php

declare(strict_types=1);

namespace Ulco\Tests;

use PHPUnit\Framework\TestCase;
use Ulco\Game;

class GameTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_number_card(): void
    {
        $game = new Game();
        $this->assertCount(26, $game->cardsPlayersOne);
        $this->assertCount(26, $game->cardsPlayersTwo);
    }

    public function test_round(): void
    {
        $game = new Game();
        $this->assertCount(count($game->cardsPlayersOne), $game->cardsPlayersTwo);
        $game->runRound();
        $this->assertNotCount(count($game->cardsPlayersOne), $game->cardsPlayersTwo);
    }

    public function test_if_game_is_not_finish(): void
    {
        $game = new Game();
        $this->assertFalse($game->gameIsFinish());
    }

}