<?php
declare(strict_types=1);

namespace App\States\Order;

class PaidOrderState extends  OrderState
{
    protected array $allowedTransitions = [CancelledOrderState::class];



    public function value(): string
    {
        return 'paid';
    }

    public function humanValue(): string
    {
        return 'оплачено';
    }


    public function canBeChanged(): bool
    {
     return false;
    }
}
