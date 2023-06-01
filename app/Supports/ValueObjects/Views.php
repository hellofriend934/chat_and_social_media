<?php
declare(strict_types=1);

namespace App\Supports\ValueObjects;

use http\Exception\InvalidArgumentException;

class Views
{


    public function __construct(private readonly int|null $value, private readonly int $precision= 100)
    {

    }


    public function raw():int
    {
        return (int)$this->value;
    }

    public function value(): int|float
    {
        return $this->value / $this->precision;
    }

    public function __toString()
    {
        if ($this->value > 0) {
            $lenghts =  strlen((string)$this->value);
            if ($lenghts == 4){
                $str = number_format($this->value,0,',','.');
                return substr($str,0,3) . 'k';
            }elseif ($lenghts === 5){
                $str =  number_format($this->value,0,',','.');
                return substr($str, 0, 4) . 'k';
            }elseif ($lenghts === 6){
                $str =  number_format($this->value,0,',','.');
                return substr($str, 0, 5) . 'k';
            }elseif ($lenghts === 7)
            {
                $str =  number_format($this->value,0,',','.');
                return substr($str, 0, 3) . 'M';
            }
            return number_format($this->value,0,',','.');
        }else return 'no views';




    }

//  public function icon()
//  {
//      return $this->currencies[$this->currency];
//  }


  public static function make(mixed ...$arguments):static
  {
      return new static(...$arguments);
  }
}
