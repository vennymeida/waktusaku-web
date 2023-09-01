<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Http\Requests\StoreContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    public function index()
    {
        $messages = DB::table('contact_us')
            ->select('id', 'nama', 'email', 'pesan')
            ->paginate(10);
        return view('message.index', compact('messages'));
    }

    public function create()
    {
        return view('contact');
    }

    public function store(StoreContactUsRequest $request)
    {
        ContactUs::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);
        return redirect('/contact-us')->with('success', 'success');
    }

    public function show(ContactUs $contactUs)
    {
        //
    }

    public function edit(ContactUs $contactUs)
    {
        //
    }

    public function update(UpdateContactUsRequest $request, ContactUs $contactUs)
    {
        //
    }

    public function destroy(ContactUs $contactUs)
    {
        $contactUs->delete();
        return redirect()->route('message.index')->with('success', 'Data Berhasil Di Hapus');
    }
}