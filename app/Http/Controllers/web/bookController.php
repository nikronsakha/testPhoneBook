<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\StoreRequest;
use App\Http\Requests\Web\UpdateRequest;
use App\Models\Category;
use App\Models\Contact;

class bookController extends Controller
{
    public function index()
    {
        $data = Contact::query()->orderBy('created_at')->paginate(10);

        return view('web.main' , ['data' => $data] );
    }

    public function create()
    {
        return view('web.create');
    }

    public function edit($id)
    {
        $post = Contact::find($id);
        return view('web.update' , ['post' => $post] );
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Contact::firstOrCreate($data);

        return redirect()->route('index');
    }


    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $post = Contact::find($id);
        $post->update($data);
        return redirect()->route('index');
    }

    public function destroy(string $id)
    {
        Contact::destroy($id);
        return redirect()->route('index');
    }
}
