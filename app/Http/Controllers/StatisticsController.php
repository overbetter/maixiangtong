<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    protected $user;

    public function __construct()
    {
        dd($this->user);

    }
    public function index()
    {
        return 123;
    }
}
