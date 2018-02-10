<?php

class Bar {

    /**
     * Количество посетителей
     * @var int
     */
    public $countVisitors;

    /**
     * Музыка которая играет в текущий момент
     * @var int
     */
    public $music;

    /**
     * Все жанры доступные в баре
     * @var array
     */
    public static $genre = [
        'Народная музыка',
        'Духовная музыка',
        'Классическая музыка',
        'Латиноамериканская музыка',
        'Блюз',
        'Ритм-н-блюз',
        'Джаз',
        'Шансон',
        'Электронная музыка',
        'РоК',
    ];

    function __construct() {
        $this->countVisitors();
        $this->nextMusic();
    }

    public function nextMusic() {
        $this->music = random_int(0, count(self::$genre) - 1);
    }

    private function countVisitors() {
        $this->countVisitors = random_int(1, 20);
    }

}
