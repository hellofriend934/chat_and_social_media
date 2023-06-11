<?php
declare(strict_types=1);

namespace App\Processes\Order;

use App\Contracts\OrderProcessContract;
use App\Models\Order;
use App\States\Order\PendingOrderState;

class ChangeStateToPending implements OrderProcessContract
{

    public function handle(Order $order, $next)
    {

        $order->status->transitionTo(new PendingOrderState($order));
        return $next($order);
    }
}
