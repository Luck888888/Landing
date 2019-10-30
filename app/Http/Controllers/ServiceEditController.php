<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Service;

class ServiceEditController extends Controller
{
    public function execute(Service $service,Request $request) {


        /*$service = service::find($id);*/

        if($request->isMethod('delete')) {
            $service->delete();
            return redirect('admin')->with('status','Страница удалена');
        }


        if($request->isMethod('post')) {


            $input = $request->except('_token');

            $validator = Validator::make($input,[

                'name'=>'required|max:255',
                'text' => 'required'

            ]);

            if($validator->fails()) {
                return redirect()
                    ->route('serviceEdit',['service'=>$input['id']])
                    ->withErrors($validator);
            }

            if($request->hasFile('icon')) {
                $file = $request->file('icon');
                $file->move(public_path().'/assets/img',$file->getClientOriginalName());
                $input['icon'] = $file->getClientOriginalName();
            }
            else {
                $input['icon'] = $input['old_icon'];
            }

            unset($input['old_icon']);

            $service->fill($input);

            if($service->update()) {
                return redirect('admin')->with('status','Страница обновлена');
            }

        }


        $old = $service->toArray();
        if(view()->exists('admin.services_edit')) {

            $data = [
                'title' => 'Редактирование страницы - '.$old['name'],
                'data' => $old
            ];
            return view('admin.services_edit',$data);

        }

    }
}
