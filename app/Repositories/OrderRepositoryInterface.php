<?php

namespace App\Repositories;
interface OrderRepositoryInterface {
    public function getAll();
    public function find($id);
}