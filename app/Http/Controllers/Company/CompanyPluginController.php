<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;


class CompanyPluginController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $companies = Company::where('id',$id)->where('status',1)->where('company_id',null)->get();
        //dd($datas);
        return view('company.pages.plugin.index-page',compact('companies'));
    }

}