<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id)
    {
        return view('admin.files.create', compact('project_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = '';
        if ($request->hasFile('file')) {
//            Store::has($request->file) ? Storage::delete($request->file) : '';
            $url = request()->file('file')->store('projects');
            $file = File::create(['name' => $url,
                'project_id' => $request->project_id
            ]);

            return response()->json([$file->name]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request  $request)
    {
//        return $request->get('filename');
       $file = $request->get('filename') ;
//       return  $file ;
//      return File::where('name' , $file)->get() ;
      File::where('name' , $file)->delete() ;
        Storage::has($request->filename) ? Storage::delete($request->filename) : '';
        return  $file ;
    }
}
