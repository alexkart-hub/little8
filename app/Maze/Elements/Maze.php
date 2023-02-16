<?php

namespace App\Maze\Elements;

class Maze
{
    public array $rooms;
    public function __construct()
    {

    }

    public function addRoom(Room $room): void
    {
        $this->rooms[$room->getRoomNo()] = $room;
    }
}