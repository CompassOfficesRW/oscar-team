<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Touchpoint;

class TouchpointController extends Controller
{
    //
    public function list(){
        $touchpoints = Touchpoint::all();
        return view('touchpoint.list_view', ['touchpoints'=> $touchpoints]);
    }

    public function show($id){
        $touchpoint = Touchpoint::findOrFail($id);
        $subject = $touchpoint['subject'];
        $content = $touchpoint['content'];
        return view('touchpoint.detail_view', ['touchpoint'=> $touchpoint, 'subject' => $subject, 'content' => $content]);
    }

    public function edit(Request $request, $id){
        if($request->isMethod('post'))
        {
            $data = $request->validate([
                'subject' => 'required',
                'content' => 'required',
            ]);

            $touchpoint = Touchpoint::find($id);
            $touchpoint->update($data);

            return view('touchpoint.detail_view', ['id'=>$touchpoint['id'], 'touchpoint'=>$touchpoint, 'subject' => $data['subject'], 'content' => $data['content']]);
        }
        $touchpoint = Touchpoint::findOrFail($id);
        $subject = $touchpoint['subject'];
        $content = $touchpoint['content'];
        return view('touchpoint.edit_view', ['action'=>"Edit", 'touchpoint'=> $touchpoint, 'subject' => $subject, 'content' => $content]);
    }

    public function create(Request $request){
        if($request->isMethod('post'))
        {
            $data = $request->validate([
                'subject' => 'required',
                'content' => 'required',
            ]);

            $touchpoint = tap(new \App\Models\Touchpoint($data))->save();

            return view('touchpoint.detail_view', ['id'=>$touchpoint['id'], 'touchpoint'=>$touchpoint, 'subject' => $data['subject'], 'content' => $data['content']]);
        }

        return view('touchpoint.create_view');
    }
}
