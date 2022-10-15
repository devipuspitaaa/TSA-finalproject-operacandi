<?php

use App\Models\Dashboard;
namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $dashboard = Dashboard::with('dashboard')->get();

        $dashboard = Dashboard::where([
            ['nama_pengawas', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('nama_pengawas', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('id', 'asc')
            ->simplePaginate(1000);

        return view('dashboard.index', compact('dashboard'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
