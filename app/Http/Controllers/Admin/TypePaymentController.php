<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypePayment\RequestCreate;
use App\Http\Requests\TypePayment\RequestUpdate;
use App\Models\TypePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TypePaymentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $typePayments = TypePayment::paginate(10);

        return view('admin.type-payment.index', ['typePayments' => $typePayments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('admin.type-payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(RequestCreate $request)
    {
        $data = $request->validated();

        TypePayment::create($data);

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     */
    public function edit(TypePayment $typePayment)
    {
        return view('admin.type-payment.edit', ['typePayment' => $typePayment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     */
    public function update(RequestUpdate $request, TypePayment $typePayment)
    {
        $data = $request->validated();

        $typePayment->update($data);

        return redirect()->route('admin.type-payments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     */
    public function destroy(TypePayment $typePayment)
    {
        $typePayment->delete();

        return back();
    }
}
