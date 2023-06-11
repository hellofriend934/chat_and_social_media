<?php
declare(strict_types=1);

namespace App\Enums;

use App\Models\Order;
use App\States\Order\CancelledOrderState;
use App\States\Order\NewOrderState;
use App\States\Order\OrderState;
use App\States\Order\PaidOrderState;
use App\States\Order\PendingOrderState;


enum OrderStatuses :string
{
    case New = 'new';
    case Pending = 'pending';
    case Paid = 'paid';
    case Cancelled = 'cancelled';

    public function createState(Order $order): OrderState
    {
       return match ($this){
            OrderStatuses::New =>new NewOrderState($order),
            OrderStatuses::Pending =>new PendingOrderState($order),
            OrderStatuses::Paid => new PaidOrderState($order),
            OrderStatuses::Cancelled => new CancelledOrderState($order),

        };
    }
}


