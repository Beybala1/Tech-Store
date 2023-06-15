<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Statistic;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::all();
        return response()->json($statistics);
    }
}
