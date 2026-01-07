<?php
namespace App\Services\OrderItem;
use App\Services\BaseService;
use App\Repositories\OrderItem\IOrderItemRepository;
class OrderItemService extends BaseService implements IOrderItemService
{
    //
    protected $orderItemRepository;
    public function __construct(IOrderItemRepository $orderItemRepository)
    {
        parent::__construct($orderItemRepository);
        $this->orderItemRepository = $orderItemRepository;
    }
}
