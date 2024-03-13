<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Contact;


class bookController extends Controller
{
    public function index()
    {
        $data = Contact::query()->orderBy('created_at')->paginate(10);
        return view('web.main' , ['data' => $data] );
    }
}
