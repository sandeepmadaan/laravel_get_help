<?php

use App\Repositories\OrderRepositoryInterface;

namespace App\Http\Controllers;

class OrderController extends Controller {

    protected $order;
    public function __construct(OrderRepositoryInterface $order) {
        $this->order = $order;
    }

    public function index() {
        $orders = $this->order->getAll();
        return View::make('orders.index', compact('orders'));
    }
}