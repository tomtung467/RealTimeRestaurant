<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OrderItemResource;
class CalculateBillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Calculate total from order items
        $total = 0;
        if ($this->relationLoaded('orderItems')) {
            foreach ($this->orderItems as $item) {
                $total += $item->product->price * $item->quantity;
            }
        }

        return [
            'order_id' => $this->id,
            //'table_id' => $this->table->id,
            'table_number' => $this->table_number,
            'total_amount' => $total,
            'status' => $this->status,
            'order_items' => OrderItemResource::collection($this->whenLoaded('orderItems')),
        ];
    }
}
