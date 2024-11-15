<?php

namespace App\Http\Controllers;

use App\Interfaces\PaymentMethodRepositoryInterface;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    protected $paymentMethodRepository;

    /**
     * Dependency injection for the repository.
     *
     * @param PaymentMethodRepositoryInterface $paymentMethodRepository
     */
    public function __construct(PaymentMethodRepositoryInterface $paymentMethodRepository)
    {
        $this->paymentMethodRepository = $paymentMethodRepository;
    }

    /**
     * Display a listing of the payment methods.
     *
     * Retrieves all payment methods from the database.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $methods = $this->paymentMethodRepository->getAllPaymentMethods();
        return response()->json($methods);
    }

    /**
     * Store a newly created payment method in storage.
     *
     * Validates the request and creates a new payment method record.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $this->paymentMethodRepository->createPaymentMethod($request->all());
    }

    /**
     * Display the specified payment method.
     *
     * Retrieves a specific payment method by its ID.
     *
     * @param int $id The ID of the payment method to retrieve.
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $method = $this->paymentMethodRepository->getPaymentMethodById($id);
        return response()->json($method);
    }

    /**
     * Update the specified payment method in storage.
     *
     * Validates the request and updates the payment method record.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the payment method to update.
     * @return PaymentMethod
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        return $this->paymentMethodRepository->updatePaymentMethod($request->all(), $id);
    }

    /**
     * Remove the specified payment method from storage.
     *
     * Deletes the specified payment method by its ID.
     *
     * @param int $id The ID of the payment method to delete.
     * @return void
     */
    public function destroy(int $id)
    {
        $this->paymentMethodRepository->deletePaymentMethod($id);
    }
}
