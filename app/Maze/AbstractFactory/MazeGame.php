<?php

namespace App\Maze\AbstractFactory;

use App\Maze\Elements\MapSite;
use App\Maze\Elements\Maze;

class MazeGame
{
    /**
     * Создает лабиринт из двух комнат с дверями между ними.
     * Чтобы создать другой лабиринт, например, с запертыми дверями,
     * необходимо создать подкласс класса MazeFactory, в котором определить
     * новую реализацию, и передать его в качестве параметра.
     * @param MazeFactory $factory
     * @return Maze
     */
    public static function CreateMaze(MazeFactory $factory): Maze
    {
        $maze = $factory->makeMaze();
        $room1 = $factory->makeRoom(1);
        $room2 = $factory->makeRoom(2);
        $door = $factory->makeDoor($room1, $room2);

        $maze->addRoom($room1);
        $maze->addRoom($room2);

        $room1->setSide(MapSite::SIDE_WEST, $factory->makeWall());
        $room1->setSide(MapSite::SIDE_EAST, $door);
        $room1->setSide(MapSite::SIDE_NORTH, $factory->makeWall());
        $room1->setSide(MapSite::SIDE_SOUTH, $factory->makeWall());

        $room2->setSide(MapSite::SIDE_WEST, $door);
        $room2->setSide(MapSite::SIDE_EAST, $factory->makeWall());
        $room2->setSide(MapSite::SIDE_NORTH, $factory->makeWall());
        $room2->setSide(MapSite::SIDE_SOUTH, $factory->makeWall());

        return $maze;
    }
}