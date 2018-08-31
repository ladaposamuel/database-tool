<?php

namespace App\Http\Controllers;

use Excel;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        $data = [];
        $data['results'] = [];

        return view('home.search')->withData($data);
    }


    public function importView()
    {
        return view('home.import');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'term' => 'required',
        ]);
        $data = [];
        $term = $request->input('term');
        $var = $request->input('var');

        $data['results'] = DB::table('peoples')->where([
            [$var, 'LIKE', '%' . $term . '%']
        ])->get();

        return view('home.results')->withData($data);
    }


    public function import(Request $request)
    {
        //  dd($request->all());

        $file = $request->file('excel_file');

        $extenstion = $file->getClientOriginalExtension();

        if ($extenstion != "xlsx") {
            Session::flash('error', "You are uploading a wrong file");
            return back();
        }
        if (Input::hasFile('excel_file')) {
            $path = Input::file('excel_file')->getRealPath();
            $import = Excel::load($path, function ($reader) {
            })->get();
            if (!empty($import) && $import->count()) {
//             dd($import);
                foreach ($import as  $value) {
                    $imports[] = array(
                        'firstname' => $value->first_name,
                        'surname' => $value->surname,
                        'number' => $value->number,
                        'sex' => $value->sex,
                        'network_name' => $value->network_name,
                        'state' => $value->state,
                        'lg' => $value->lg,
                    );
                }

                if (empty($imports) && is_null($imports)) {
                    Session::flash('error', 'No data to import');
                    return back();
                } else {
                    //preview data
                    Session::flash('success', 'File uploaded successfully');
                    return view('home.preview')->withImports($imports);
                }
            }
        }
    }
}
