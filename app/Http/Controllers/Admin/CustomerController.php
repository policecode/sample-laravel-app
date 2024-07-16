<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Customer::filter($request);
        $res = [
            'page' => $query->getPageNumber(),
            'per_page' => $query->getPerPage(),
        ];
        if($request->is_paginate){
            $res['total_records'] = $query->getTotal();
        }else{
            $res['records'] = $query->get();
        }

        return response()->json($res);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        try {
            $data = $request->validated();
            $data['birthday'] = Carbon::create($data['birthday']);
            $customer = Customer::create($data);
            return response()->json([
                'result' => 1,
                'data' => $customer
            ]);
        } catch (\Exception $e) {
            return response()->json(['result' => 0, 'message' => $e->getMessage()], 400);
        }
    }

    public function storeList(Request $request)
    {
        try {
            $rules = [
                'data' => 'array'
            ];
            $validator = Validator::make($request->all(), $rules); 
            if ($validator->fails()) {
                return $validator->errors();
            }
            $data =  $validator->validated();
            $dataInsert = $data['data'];
            foreach ($dataInsert as $key => $value) {
                $dataInsert[$key]['birthday'] = Carbon::create($value['birthday']);
            }
            $customer = Customer::insert($dataInsert);
            return response()->json([
                'result' => 1,
                'data' => $customer
            ]);
        } catch (\Exception $e) {
            return response()->json(['result' => 0, 'message' => $e->getMessage()], 400);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
