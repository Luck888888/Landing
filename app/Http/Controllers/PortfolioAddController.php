<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;
use Validator;

class PortfolioAddController extends Controller
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
                'filter' => 'required|unique:portfolios|max:255',

            ], $massages);

            if($validator->fails()) {
                return redirect()->route('portfolioAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')) {
                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img',$input['images']);

            }

            //сохранение в базе данных инфы
            $page = new Portfolio();

            //$page->unguard();
            //заполнение полей бд
            $page->fill($input);

            if($page->save()) {
                return redirect('admin')->with('status','Страница добавлена');
            }

        }

//запрос типа get - выводит форму
        if(view()->exists('admin.portfolios_add')) {

            $data = [

                'title' => 'Новое портфолио'

            ];
            return view('admin.portfolios_add',$data);

        }

        abort(404);


    }
}
