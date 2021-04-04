<?php

namespace chumakov;

use core\EquationInterface;

Class Kvadratnoe extends Lineynoe implements EquationInterface
{
    protected function discriminant($a, $b, $c)
    {
        return $discriminant = $b * $b - 4 * $a * $c;
	}
	public function solve($a, $b, $c): array
    {
        if($a == 0)
        {
            return parent::solveLine($b, $c);
        }

        $discriminant = $this->discriminant($a, $b, $c);

        if($discriminant > 0)
        {
            MyLog::log('This is square Equation');
            $squareDiscriminant = sqrt($discriminant);
            return $this->x = array((-$b + $squareDiscriminant) / (2 * $a), (-$b - $squareDiscriminant) / (2 * $a));
        }
        if($discriminant == 0)
        {
            return $this->x =  array(-$b / (2 * $a));
        }
        if($discriminant < 0)
        {
            throw new ChumakovException('The equation has no solutions');
        }
        throw new ChumakovException('No roots');
	}
}
