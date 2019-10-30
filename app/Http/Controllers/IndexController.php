<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Service;
use App\People;
use App\Portfolio;
use DB;
use Mail;


class IndexController extends Controller
{
    public function execute(Request $request){


        if($request->isMethod('post')){

            $message=[
                'required'=>'Поле :attribute обязательно к заполнению',
                'email'=>'Поле :attribute должно соответствовать email адресу'
            ];
            $this->validate($request,[
                'contactName'=>'required|max:255',
                'contactEmail'=>'required|email',
                'contactMessage'=> 'required'

            ], $message);

            $data = $request->all();

            //отправка сообщения на определенный почтовый ящик
         $result=Mail::send('site.email',['data'=>$data],function($message) use ($data){

                 $mail_admin=env('MAIL_ADMIN');
                 $message->from($data['email'], $data['name']);
                 $message->to($mail_admin)->subject('Question');
             });
         if($result){
             return redirect()->route('home')->with('status','Email is send');
         }
        }

        $pages= Page::all();
        $portfolios= Portfolio::get(array('name','filter','images'));
        $services= Service::where('id','<',20)->get();
        $peoples= People::take(4)->get();
        //dd($services);

        $tags = DB::table('portfolios')->distinct()->pluck('filter');

        $menu=array();
//        для формирования пунктов меню из базы данных
         foreach ($pages as $page){
             $item = array('title'=>$page->name,'alias'=>$page->alias);
             array_push($menu,$item);
         }


         //dd($menu);

        //добавляет пункты меню не из бд
//        $item = array('title'=>'Home','alias'=>'intro');
//         array_push($menu,$item);
//
//        $item = array('title'=>'About','alias'=>'about');
//        array_push($menu,$item);
//
//        $item = array('title'=>'Resume','alias'=>'resume');
//        array_push($menu,$item);
//
//        $item = array('title'=>'Portfolio','alias'=>'portfolio');
//        array_push($menu,$item);
//
//        $item = array('title'=>'Services','alias'=>'services');
//        array_push($menu,$item);
//
//        $item = array('title'=>'Contact','alias'=>'contact');
//        array_push($menu,$item);

        return view('site.index', compact('page', 'services','portfolio','people','menu','tags'));

//        return view('site.index',array(
//                                     'menu'=>$menu,
//                                     'page'=>$pages,
//                                     'services'=>$services,
//                                     'portfolios'=>$portfolios,
//                                     'peoples'=>$peoples,
//        ));

    }
}
