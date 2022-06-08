<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('file');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        $name = time() . '.' . request()->file->getClientOriginalExtension();

        $request->file->move(public_path('uploads'), $name);

        $file = new FileUpload;
        $file->name = $name;
        $file->save();
       return redirect()->route('home')->with('success', 'File Uploaded Successfully');
        // return response()->json(['success' => 'Successfully uploaded.']);
    }
}
