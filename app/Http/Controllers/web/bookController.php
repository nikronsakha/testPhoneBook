<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\StoreRequest;
use App\Http\Requests\Web\UpdateRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class bookController extends Controller
{
    public function index()
    {
        $data = Contact::query()->orderBy('created_at')->paginate(10);
        return view('web.main' , ['data' => $data] );
    }
}
