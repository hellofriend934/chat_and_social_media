<?php
declare(strict_types=1);

namespace App\Processes\Order;

use App\Contracts\OrderProcessContract;
use App\Models\Order;
use App\Models\User;
use App\States\Order\PendingOrderState;

class ChangeUserStatus implements OrderProcessContract
{

    public function handle(Order $order, $next)
    {
        User::query()->where('id',auth()->id())->update(['status'=>'pro']);
        return $next($order);
    }
}
