<?php
declare(strict_types=1);

namespace App\States\Order;


use App\Models\Order;
use InvalidArgumentException;
use mysql_xdevapi\Exception;

abstract class OrderState
{
    public function __construct(protected Order $order)
    {
    }

    protected array $allowedTransitions = [

    ];


 abstract public function canBeChanged():bool;


 abstract public function value() : string ;

  public function transitionTo(OrderState $state)
  {
      if (!$this->canBeChanged()){
         throw new InvalidArgumentException('cant be changed');
      }

      if (!in_array(get_class($state), $this->allowedTransitions)){
          throw new  InvalidArgumentException("no transition for {$this->order->status->value()} to {$state->value()}");
      }

      $this->order->updateQuietly(['status'=>$state->value()]);
  }
}
