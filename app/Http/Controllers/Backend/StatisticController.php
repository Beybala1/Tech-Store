<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use App\Models\StatisticTranslation;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::latest()->get();
        return view('backend.statistic.index', get_defined_vars());
    }

    public function create()
    {
        return view('backend.statistic.create');
    }

    public function store(Request $request)
    {
        try {
            $statistic = Statistic::create([
                'number' => $request->number,
            ]);
            foreach (lang() as $language) {
                $translation = new StatisticTranslation();
                $translation->title = $request->title[$language->code];
                $translation->locale = $language->code;
                $translation->statistic_id = $statistic->id;
                $translation->save();
            }
            return to_route('statistic.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function edit(Statistic $statistic)
    {
        return view('backend.statistic.edit', get_defined_vars());
    }

    public function update(Request $request, Statistic $statistic)
    {
        try {
            $statistic->update([
                'number'=>$request->number
            ]);
            foreach (lang() as $language) {
                $translationData = [
                    'title' => $request->title[$language->code],
                    'locale' => $language->code,
                ];
                $statistic->translations()->updateOrCreate(['locale' => $language->code], $translationData);
            }

            $statistic->save();
            return to_route('statistic.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }


    public function destroy(Statistic $statistic)
    {
        $statistic->delete();
        return to_route('statistic.index')->with('success', __('messages.success'));
    }
}
