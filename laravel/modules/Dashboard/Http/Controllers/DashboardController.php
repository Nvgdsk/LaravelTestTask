<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        return view('dashboard::index');
    }
}
