<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Validator;

class ServiceAddController extends Controller
{
    public function execute(Request $request) {

        if($request->isMethod('post')) {
            $input = $request->except('_token');

            $massages = [

                'required'=>'Поле :attribute обязательно к заполнению',
                'unique'=>'Поле :attribute должно быть уникальным'

            ];


            $validator = Validator::make($input,[

                'name' => 'required|max:255',
                'text'=> 'required'

            ], $massages);

            if($validator->fails()) {
                return redirect()->route('serviceAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')) {
                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img',$input['images']);

            }

            //сохранение в базе данных инфы
            $service = new Service();

            //$service->unguard();
            //заполнение полей бд
            $service->fill($input);

            if($service->save()) {
                return redirect('admin')->with('status','Страница добавлена');
            }

        }

//запрос типа get - выводит форму
        if(view()->exists('admin.services_add')) {

            $data = [

                'title' => 'Новый сервис'

            ];
            return view('admin.services_add',$data);

        }

        abort(404);


    }
}
