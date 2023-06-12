<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderFormRequest;
use App\Models\Order;
use App\Processes\Order\ChangeStateToPaid;
use App\Processes\Order\ChangeStateToPending;
use App\Processes\Order\ChangeUserStatus;
use App\Processes\Order\OrderProcess;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __invoke(OrderFormRequest $request)
    {
        $data = $request->validated();
        $order = (Order::query()->create(['user_id'=>auth()->id(),
            'email'=>$data['email'],'card_number'=>$data['card_number'],
            'credit-expiry'=>$data['credit-expiry'], 'cvc'=>$data['cvc'],'status'=>'new'
        ]));

        (new OrderProcess($order))->processes([
            new ChangeStateToPending(),
            new ChangeStateToPaid(),
            new ChangeUserStatus(),
        ])->run();

        return redirect('/');
    }


}
