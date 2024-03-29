<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function execute() {

        if(view()->exists('admin.potrfolios')) {

            $portfolios = Portfolio::all();

            $data = [
                'title' => 'Портфолио',
                'portfolio' => $portfolios
            ];

            return view('admin.potrfolios',$data);
        }
        abort(404);}
}
