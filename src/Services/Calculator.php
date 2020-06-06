<?php

namespace Domain\Services;

class Calculator
{
    /**
     * @param int $d1
     * @param int $d2
     * @return int
     */
    public function summ(int $d1, int $d2): int
    {
        return $d1 + $d2;
    }
}