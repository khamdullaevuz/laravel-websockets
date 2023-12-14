<?php

namespace App\Http\Controllers;

use App\Events\Paid;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        event(new Paid());
        echo "test";
    }

    public function checkStatus()
    {
        return view('transaction');
    }
}
