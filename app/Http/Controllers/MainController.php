<?php
namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\PageVisit;
use App\Models\Program;
use App\Models\Sponsor;
use App\Models\Statistics;
use App\Models\WhyUs;
use Illuminate\Support\Facades\Request;

class MainController extends Controller
{
    public function home(Request $request)
    {
        $hero       = HeroSection::first();
        $whyus      = WhyUs::all();
        $statistics = Statistics::all();
        $sponsors   = Sponsor::where("is_active", true)->get();

        if (! session()->has('visited_home')) {
            $home = PageVisit::firstOrCreate(
                ['page' => 'home'],
                ['visits' => 0]
            );
            $home->increment('visits');

            session()->put('visited_home', true);
        }

        return view("home", compact('hero', "whyus", 'statistics', "sponsors"));
    }

    public function getProgram($id)
    {

        $program = Program::with("dayActivity", "goals", "images")->findOrFail($id);
        return view('program', compact("program"));
    }

}
