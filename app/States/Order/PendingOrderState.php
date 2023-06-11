<?php
declare(strict_types=1);

namespace App\States\Order;

class PendingOrderState extends  OrderState
{
    protected array $allowedTransitions = [PaidOrderState::class, CancelledOrderState::class];


    public function value(): string
    {
        return 'pending';
    }

    public function humanValue(): string
    {
        return 'В обработке';
    }


    public function canBeChanged(): bool
    {
        return true;
    }
}
