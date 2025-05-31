<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class homeController extends Controller
{
    public function index(){

        return view('panel.index');
    }
}
