<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Customer;
use Illuminate\Http\Request;

class APIController extends Controller
{
    //Api
    public function customers()
    {

        $customers =    Customer::latest()-> get();
        $api_data =[

            'status'        => 'active',
            'smg'           => 'Get all customer data',
            'customers'     => $customers

        ];

        return response()->json($api_data);
    }

    /**
     * Get Sinle Customer
     */
    public function singlecustomer($id)
    {
        $single_customer =    Customer::find($id);

        $apiData = [

            'status'        => 'Active',
            'msg'           => 'This Is single Customer',
            'singlecustomer'    => $single_customer,

        ];

        return response()->json($apiData);


    }





}
