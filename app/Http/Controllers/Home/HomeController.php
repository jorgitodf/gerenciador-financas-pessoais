<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;

class HomeController extends Controller
{
    protected $model;

    public function __construct(Account $account)
    {
        $this->model = $account;
    }

    public function index()
    {
        $contas = $this->model::all();
        return view('home.index', compact('contas'));
    }

}
