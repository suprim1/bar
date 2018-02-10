<?php

class Visitor {

    /**
     * Количество любимых жанров музыки
     * @var int
     */
    public $countGenre;

    /**
     * Набор любимых жанров
     * @var array
     */
    public $favoriteGenres = [];

    /**
     * Все возможные состояния посетителя
     * @var array
     */
    public static $state = [
        'идет танцевать',
        'берет себе коктейли',
    ];

    /**
     * Текущее состояние посетителя
     * @var string
     */
    public $currentState;

    public function __construct() {
        $this->countGenre();
        $this->favoriteGenres();
    }

    private function countGenre() {
        $this->countGenre = random_int(1, 3);
    }

    /**
     * Определяем любимые жанры для посетителя
     */
    private function favoriteGenres() {
        for ($i = 1; $i <= $this->countGenre; $i++) {
            $genre = $this->randomGenre();
            while (in_array($genre, $this->favoriteGenres)) {
                $genre = $this->randomGenre();
            }
            $this->favoriteGenres[] = $genre;
        }
    }

    public function currentState(int $music) {
        if (in_array($music, $this->favoriteGenres)) {
            $this->currentState = self::$state[0];
        } else {
            $this->currentState = self::$state[1];
        }
    }

    private function randomGenre() {
        return random_int(0, count(Bar::$genre) - 1);
    }

}
