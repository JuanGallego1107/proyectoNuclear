<?php

namespace App\Interfaces;

interface PaymentMethodRepositoryInterface
{
    /**
     * Retrieve all payment methods from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllPaymentMethods();

    /**
     * Create a new payment method record.
     *
     * @param array $data
     * @return \App\Models\PaymentMethod
     */
    public function createPaymentMethod(array $data);

    /**
     * Retrieve a specific payment method by its ID.
     *
     * @param int $id
     * @return \App\Models\PaymentMethod
     */
    public function getPaymentMethodById(int $id);

    /**
     * Update an existing payment method record by its ID.
     *
     * @param array $data
     * @param int $id
     * @return \App\Models\PaymentMethod
     */
    public function updatePaymentMethod(array $data, int $id);

    /**
     * Delete a payment method by its ID.
     *
     * @param int $id
     * @return void
     */
    public function deletePaymentMethod(int $id);
}
