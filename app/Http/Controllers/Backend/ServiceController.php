<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceTranslation;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('backend.service.index', get_defined_vars());
    }

    public function create()
    {
        return view('backend.service.create');
    }

    public function store(Request $request)
    {
        try {
            $service = Service::create([
                'icon' => $request->icon,
            ]);
            foreach (lang() as $language) {
                $translation = new ServiceTranslation();
                $translation->title = $request->title[$language->code];
                $translation->content = $request->content[$language->code];
                $translation->locale = $language->code;
                $translation->service_id = $service->id;
                $translation->save();
            }
            return to_route('service.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function edit(Service $service)
    {
        return view('backend.service.edit', get_defined_vars());
    }

    public function update(Request $request, Service $service)
    {
        try {
            foreach (lang() as $language) {
                $services->create([
                    'icon'=>$request->icon
                ]);
                $translationData = [
                    'title' => $request->title[$language->code],
                    'content' => $request->content[$language->code],
                    'locale' => $language->code,
                ];
                $service->translations()->updateOrCreate(['locale' => $language->code], $translationData);
            }

            $service->save();
            return to_route('service.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }


    public function destroy(Service $service)
    {
        $service->delete();
        return to_route('service.index')->with('success', __('messages.success'));
    }
}
