<?php

include('bar.php');
include('visitor.php');
$bar = new Bar();
writlnBar($bar);

for ($i = 1; $i <= $bar->countVisitors; $i++) {
    $visitors_{$i} = new Visitor();
    writln($visitors_{$i}, $bar, $i);
}
$j = 0;
while ($j < 100) {
    for ($i = 10; $i > 0; $i--) {
        writlnBar($bar);
        for ($k = 1; $k <= $bar->countVisitors; $k++) {
            writln($visitors_{$k}, $bar, $k);
        }
        echo "                            \e[1m Музыка смениться через: $i сек \e[0m \n";
        sleep(1);
        system('clear');
    }
    $bar->nextMusic();
    $j++;
}

function writln($visitors, $bar, int $i) {
    $visitors->currentState($bar->music);
    echo "\e[1m Посетитель №$i \e[0m \n";
    echo "  Любимые жанры:  \n";
    foreach ($visitors->favoriteGenres as $genre) {
        echo "    \e[3m- " . Bar::$genre[$genre] . "\e[0m \n";
    }
    echo "  Текущее состояние: " . $visitors->currentState . "\n";
    echo "\e[4m                                        \e[0m \n";
}

function writlnBar($bar) {
    system('clear');
    echo " Б А Р \n";
    echo "Количество посетителей: $bar->countVisitors \n";
    echo "Текущий жанр: " . Bar::$genre[$bar->music] . "\n\n";
}
