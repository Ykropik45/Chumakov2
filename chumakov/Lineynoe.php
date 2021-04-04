<?php

namespace chumakov;

Class Lineynoe
{
    protected $x;

    public function solveLine ($a, $b)
    {
		if ($a == 0)
		{
		    throw new ChumakovException('No roots');
		}
        MyLog::log('This is line equation');
		return $this->x= array(-$b / $a);
	}
}
