<?php
declare(strict_types=1);

namespace App\States\Order;

class NewOrderState extends OrderState
{
 protected array $allowedTransitions = [
    PendingOrderState::class,
    CancelledOrderState::class,
     PaidOrderState::class,
];
    public function canBeChanged(): bool
    {
        return true;
    }

    public function value(): string
    {
        return 'new';
    }

    public function humanValue(): string
    {
        return 'новый заказ';
    }
}
