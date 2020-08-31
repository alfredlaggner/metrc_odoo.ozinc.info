<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\MetrcTag;
use Maatwebsite\Excel\Facades\Excel;
use \App\Imports\MetrcTagsCollection;
use Illuminate\Support\Facades\DB;

class ImportTagsController extends Controller
{
    public function index()
    {
        $tags = MetrcTag::limit(50)->orderBy('updated_at', 'desc')->get();
        return view('imports.tag_import', compact('tags'));
    }

    public function import_tags(Request $request)
    {
        $request->validate(['import_file' => 'required']);

//dd($request->file('import_file'));
//
        $path1 = $request->file('import_file')->store('temp');
        $path=storage_path('app').'/'.$path1;
       // DB::table('metrc_tags')->delete();
        Excel::import(new MetrcTagsCollection, $path);

        return redirect('/')->with('success', 'All good!');
    }
}
