<?php
namespace App\Repositories\Order;
use App\Repositories\IBaseRepository;
interface IOrderRepository extends IBaseRepository
{
    //
    public function GetunpaidOrdersByTable($tablenumber);
    public function updateitemstatus($itemId, $status);
    public function createOrder($tablenumber, $items);
}
