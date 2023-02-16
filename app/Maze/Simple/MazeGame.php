<?php

namespace App\Maze\Simple;

use App\Maze\Elements\Door;
use App\Maze\Elements\MapSite;
use App\Maze\Elements\Maze;
use App\Maze\Elements\Room;
use App\Maze\Elements\Wall;

class MazeGame
{

    /**
     * Создает лабиринт из двух комнат с дверями между ними.
     * Чтобы создать другой лабиринт, например, с запертыми дверями,
     * необходимо переделать (переопределить в подклассе) данный метод.
     * @return Maze
     */
    public static function createMaze(): Maze
    {
        $maze = new Maze();
        $room1 = new Room(1);
        $room2 = new Room(2);
        $door = new Door($room1, $room2);

        $maze->addRoom($room1);
        $maze->addRoom($room2);

        $room1->setSide(MapSite::SIDE_WEST, new Wall());
        $room1->setSide(MapSite::SIDE_EAST, $door);
        $room1->setSide(MapSite::SIDE_NORTH, new Wall());
        $room1->setSide(MapSite::SIDE_SOUTH, new Wall());

        $room2->setSide(MapSite::SIDE_WEST, $door);
        $room2->setSide(MapSite::SIDE_EAST, new Wall());
        $room2->setSide(MapSite::SIDE_NORTH, new Wall());
        $room2->setSide(MapSite::SIDE_SOUTH, new Wall());

        return $maze;
    }
}