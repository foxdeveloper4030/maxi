<?php
/**
 * Created by PhpStorm.
 * User: Arsi
 * Date: 10/21/2019
 * Time: 12:13 AM
 */

namespace App;


class OrderModul
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function state()
    {
        $state = OrderState::query()->find($this->order->state_id);
        switch ($state->id) {
            case 1:
                return '<div style="padding: 1% 10% 2% 10%;" class="label label-default">' . $state->name . '</div>';
                break;
            case 2:
                return '<div style="padding: 1% 10% 2% 10%;" class="label label-warning">' . $state->name . '</div>';
                break;
            case 3:
                return '<div style="padding: 1% 10% 2% 10%;" class="label label-danger">' . $state->name . '</div>';
                break;
            case 4:
                return '<div style="padding: 1% 10% 2% 10%;" class="label label-info">' . $state->name . '</div>';
                break;
            case 5:
                return '<div style="padding: 1% 10% 2% 10%;" class="label label-success">' . $state->name . '</div>';
                break;

        }
    }

    public function text()
    {
        $state = OrderState::query()->find($this->order->state_id);
        return $state->text;
    }

    public function off($product)
    {

    }
}