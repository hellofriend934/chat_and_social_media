<?php
declare(strict_types=1);

namespace App\States\Order;

class CancelledOrderState extends  OrderState
{
    protected array $allowedTransitions = [];

    public function canBeChange(): bool
    {
        return false;
    }

    public function value(): string
    {
        return 'cancelled';
    }

    public function humanValue(): string
    {
        return 'заказ отменен';
    }


    public function canBeChanged(): bool
    {
        return false;
    }
}
