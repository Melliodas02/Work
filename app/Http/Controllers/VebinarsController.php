<?php

namespace App\Http\Controllers;

use App\Models\Vebinar;
use App\Models\Vebinar_Docs;
use Illuminate\Http\Request;

class VebinarsController extends Controller
{
    public function add()
    {
        return view('App.Vebinars.Adding');
    }

    public function vebinar_info($id)
    {
        $vebinar = new Vebinar();
        $veb = $vebinar->find($id);
        $vebDocs = new Vebinar_Docs();
        $doc = $vebDocs->where('ID_VEBINAR', $id)->get();
        return view('App.Vebinars.VebinarInfo', ['data'=>$veb, 'docs' => $doc]);
    }

    public function add_submit(Request $request)
    {
        $vebinar = new Vebinar();
        $vebinar->Topic = $request->input('topic');
        $vebinar->Stage = 'Подготовка доклада';
        $vebinar->save();

        return redirect()->action([VebinarsController::class, 'vebinar_list']);
    }

    public function vebinar_list()
    {
        $vebinar = new Vebinar();
        return view('App.Vebinars.VebinarsList', ['data' => $vebinar->all()]);
    }

    public function add_docs($id)
    {
        $vebinar = new Vebinar();
        $data = $vebinar->find($id);
        return view('App.Vebinars.AddDocs', ['id' => $id, 'data' => $data]);
    }

    public function add_docs_submit($id, Request $request)
    {
        $fileext1 = $request->file('doc')->getClientOriginalName();
        $fileext2 = $request->file('slide')->getClientOriginalName();

        $filename1 = pathinfo($fileext1, PATHINFO_FILENAME);
        $filename2 = pathinfo($fileext2, PATHINFO_FILENAME);

        $ext1 = $request->file('doc')->getClientOriginalExtension();
        $ext2 = $request->file('slide')->getClientOriginalExtension();

        $nameToStorage1 = $filename1.'_'.time().'.'.$ext1;
        $nameToStorage2 = $filename2.'_'.time().'.'.$ext2;

        $path1 = $request->file('doc')->move('files', $nameToStorage1);
        $path2 = $request->file('slide')->move('files', $nameToStorage2);

        $docs1 = new Vebinar_Docs();
        $docs2 = new Vebinar_Docs();

        $docs1->ID_VEBINAR = $id;
        $docs2->ID_VEBINAR = $id;
        $docs1->Description= $request->input('docDesc');
        $docs2->Description= $request->input('docSlide');
        $docs1->FileSrc = $path1;
        $docs2->FileSrc = $path2;
        $docs1->save();
        $docs2->save();

        $vebinar = new Vebinar();

        $vebinar->where('id', $id)->update(['Stage'=> 'Планирование вебинара']);

        return redirect()->action([VebinarsController::class, 'vebinar_list']);
    }

    public function add_date($id)
    {
        $vebinar = new Vebinar();
        $data = $vebinar->find($id);
        return view('App.Vebinars.AddDate', ['id' => $id, 'data' => $data]);
    }

    public function add_date_submit($id, Request $request)
    {
        $data = date("Y-m-d", strtotime($request->input('date')))." ".$request->input('time');
        $vebinar = new Vebinar();
        $vebinar->where('id', $id)->update(['DateTime'=> $data, 'Stage' => 'Подготовка инфраструктуры']);
        return redirect()->action([VebinarsController::class, 'vebinar_list']);
    }
}
