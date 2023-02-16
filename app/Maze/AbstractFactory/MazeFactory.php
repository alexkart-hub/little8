<?php

namespace App\Maze\AbstractFactory;

use App\Maze\Elements\Door;
use App\Maze\Elements\Maze;
use App\Maze\Elements\Room;
use App\Maze\Elements\Wall;

abstract class MazeFactory
{
    public function __construct()
    {

    }

    public function makeMaze(): Maze
    {
        return new Maze();
    }

    public function makeWall(): Wall
    {
        return new Wall();
    }

    public function makeRoom(int $Num): Room
    {
        return new Room($Num);
    }

    public function makeDoor(Room $room1, Room $room2): Door
    {
        return new Door($room1, $room2);
    }
}