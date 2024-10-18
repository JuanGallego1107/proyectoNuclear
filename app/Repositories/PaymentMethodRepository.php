<?php

namespace App\Repositories;

use App\Interfaces\PaymentMethodRepositoryInterface;
use App\Models\PaymentMethod;

class PaymentMethodRepository implements PaymentMethodRepositoryInterface
{
    public function getAllPaymentMethods()
    {
        return PaymentMethod::get();
    }

    public function createPaymentMethod(array $data)
    {
        return PaymentMethod::create([
            'name' => $data['name'],
        ]);
    }

    public function getPaymentMethodById(int $id)
    {
        return PaymentMethod::findOrFail($id);
    }

    public function updatePaymentMethod(array $data, int $id)
    {
        $method = PaymentMethod::findOrFail($id);

        $method->update([
            'name' => $data['name'],
        ]);

        return $method;
    }

    public function deletePaymentMethod(int $id)
    {
        $method = PaymentMethod::findOrFail($id);
        $method->delete();
    }
}
