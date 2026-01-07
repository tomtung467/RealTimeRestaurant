<?php
namespace App\Repositories\Order;
use App\Repositories\IBaseRepository;
interface IOrderRepository extends IBaseRepository
{
    //
    public function GetunpaidOrdersByTable($tableId);
}
