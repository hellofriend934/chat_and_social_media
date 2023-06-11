<?php
declare(strict_types=1);

namespace App\Processes\Order;


use App\Models\Order;
use Illuminate\Pipeline\Pipeline;
use App\Supports\Transaction;
use Throwable;

class OrderProcess
{
   protected array $processes = [];
   public function __construct(protected Order $order)
   {

   }

   public function processes(array $processes):self
   {
       $this->processes = $processes;
       return $this;
   }

   public function run(): ?Order
   {
       return  Transaction::run(function (){
           return app(Pipeline::class)->send($this->order)->through($this->processes)->thenReturn();
       }, function (){
          flash()->info('The processes were successful ');
          },
       function (Throwable $e){
           throw new \Exception(app()->isLocal() ? $e->getMessage() : 'возникли ошибки при обработке заказа');
       });
   }
}
