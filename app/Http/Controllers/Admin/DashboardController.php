<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index(){
        $this->data['payment'] = Payment::orderBy('id','DESC')->paginate(10);

        return view('admin.dashboard.index', $this->data);
    }

    public function show(){
        $this->data['payment'] = Payment::orderBy('id','DESC')->paginate(10);

        return view('admin.dashboard.index', $this->data);
    }
}
