<?php

namespace App\Http\Controllers;

use App\Models\Ale;
use App\Http\Requests\AleRequest;
use Illuminate\Http\Request;
use File;
use Validator;
use Illuminate\Support\Str;
use Session;

class AleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ale = Ale::paginate(12);

        return view('thuthuy.pages.ales.index', compact('ale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thuthuy.pages.ales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AleRequest $request)
    {
        if ($request->hasFile('image'))
        {
            $file = $request->image;

            $file_name = $file->getClientOriginalName();

            $file_type = $file->getMimeType();

            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif')
            {
                if ($file_size <= 10485760 )
                {
                    $file_name = date('d-m-y').'-'.rand().'-'.Str::slug($file_name);

                    if ($file->move('img/upload/ale',$file_name))
                    {
                        $data = $request->all();

                        $data['image'] = $file_name;

                        Ale::create($data);

                        return redirect()->route('ales.index')->with('success','Đã tạo thành công ');
                    }
                }
                else
                {
                     return back()->with('error','file ảnh không được lớn hơn 10MB');
                }
            }
            else
            {
                return back()->with('error','Đây không phãi là file ảnh');
            }
        }
        else
        {
            $data = $request->all();

            Ale::create($data);

            return redirect()->route('ales.index')->with('success','Đã tạo thành công ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ale  $ale
     * @return \Illuminate\Http\Response
     */
    public function show(Ale $ale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ale  $ale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ale = Ale::find($id);

        return response()->json($ale, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ale  $ale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'title' => 'min:1|max:255',
                'image' => 'image',
            ],
            [
                'min' => 'Tiêu đề không được ngắn hơn 1 ký tự',
                'max' => 'Tiêu đề không được dài hơn 255 ký tự',
                'image' => 'Đây không phãi là file ảnh',
            ]);

        if ($validator->fails())
        {
            return response()->json(['error' => 'true','message'=> $validator->errors()], 200);
        }

        $ale = Ale::find($id);

        $data = $request->all();

        if ($request->hasFile('image'))
        {
            $file = $request->image;

            $file_name = $file->getClientOriginalName();

            $file_type = $file->getMimeType();

            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif')
            {
                if ($file_size <= 10485760 )
                {
                    $file_name = date('d-m-y').'-'.rand().'-'.Str::slug($file_name);

                    if ($file->move('img/upload/ale/',$file_name))
                    {
                        $data['image'] = $file_name;

                        $ale->update($data);

                        Session::flash('success', 'Cập nhật thành công .');

                        return response()->json(200);
                    }
                }
                else
                {
                    return response()->json(['error' => ' File ảnh không được lớn hơn 10MB '], 200);
                }
            }
            else
            {
                return response()->json(['error' => ' Đây không phãi là file ảnh '], 200);
            }
        }
        else
        {
            $ale->update($data);

            Session::flash('success', 'Cập nhật thành công .');

            return response()->json(200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ale  $ale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ale = Ale::find($id);

        if (!empty($ale->image))
        {
            if (file_exists(public_path('img/upload/ale/'. $ale->image)))
            {
                unlink(public_path('img/upload/ale/'. $ale->image));

                $ale->delete();

                Session::flash('success', 'Đã xoá thành công .');

                return response()->json(200);
            }
        }
        else
        {
            $ale->delete();

            Session::flash('success', 'Đã xoá thành công .');

            return response()->json(200);
        }
    }

    public function delAll(Request $request)
    {
        $idAle = $request->input('idAles');

        if (!empty($idAle))
        {
            Ale::whereIn('id', $idAle)->delete();

            return redirect()->route('ales.index')->with('success', 'Đã xoá thành công .');
        }
        else
        {
            return back()->with('error', 'Bạn cần phãi chọn dữ liệu cần xoá !');
        }  
    }
}
