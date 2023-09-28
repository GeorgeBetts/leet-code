<?php

function sortTemperatures(array $temperatures = []): array
{
    // create a hash table of the temperatures with a no. of occurences
    $tempOccurences = [];
    for ($i = 0; $i < count($temperatures); $i++) {
        if (isset($tempOccurences[$temperatures[$i]])) {
            $tempOccurences[(string)$temperatures[$i]]++;
        } else {
            $tempOccurences[(string)$temperatures[$i]] = 1;
        }
    }
    // create the sorted array by looping all possible temperatures (97.0 to 99.0)
    $potentialTemps = range(97, 99, 0.1);
    $sortedTemps = [];
    for ($i = 0; $i < count($potentialTemps); $i++) {
        if (isset($tempOccurences[(string)$potentialTemps[$i]])) {
            for ($j = 0; $j < $tempOccurences[(string)$potentialTemps[$i]]; $j++) {
                $sortedTemps[] =  $potentialTemps[$i];
            }
        }
    }
    return $sortedTemps;
}

print_r(sortTemperatures([98.6, 98.0, 97.1, 99.0, 98.9, 97.8, 98.5, 98.2, 98.0, 97.1]));
