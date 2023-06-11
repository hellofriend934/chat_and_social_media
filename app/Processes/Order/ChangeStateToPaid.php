<?php
declare(strict_types=1);

namespace App\Processes\Order;

use App\Contracts\OrderProcessContract;
use App\Models\Order;
use App\States\Order\PaidOrderState;
use App\States\Order\PendingOrderState;

class ChangeStateToPaid implements OrderProcessContract
{

    public function handle(Order $order, $next)
    {
        $order->status->transitionTo(new PaidOrderState($order));
        return $next($order);
    }
}
