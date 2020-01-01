<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ThemesController extends Controller
{
    // Middleware
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:theme manager');
    }

    public function index(Request $request)
    {
        $themes = Theme::all();
        return  view('themes.index', compact('themes')); // send $themes to view
    }


    public function create()
    {
        return view('themes.create');
    }


    public function store(Theme $theme)                    // store after submiting a new theme (themes/create.blade.php)
    {
        Theme::where("themes.is_default", '=', '1')->update(['themes.is_default'=> '0']);

        // back-end validation
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:30'],
            'cdn_url' => ['required', 'min:3', 'max:255', 'url'],
            'description' => ['required', 'min:3', 'max:100'],
            'is_default' => 'boolean'
        ]);

        Theme::create($attributes);

        return redirect('/admin/themes')->with('info','Theme created successfully!');
    }


    public function show(Theme $theme)        //route model binding
    {
        return view('themes.show', compact('theme'));
    }


    public function edit(Theme $theme)      //  admin/themes/1/edit
    {
        return view('themes.edit', compact('theme'));
    }


    public function update(Theme $theme)
    {
        //dd('hello!');
        // back-end validation
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:30'],
            'cdn_url' => ['required', 'min:3', 'max:255', 'url'],
            'description' => ['required', 'min:3', 'max:100'],
            'is_default' => 'boolean'
        ]);

        //transaction
        Theme::where("themes.is_default", '=', '1')->update(['themes.is_default'=> '0']);
        $theme->update($attributes);

        return redirect('/admin/themes')->with('info','Theme updated successfully!');
    }


    public function destroy(Theme $theme)
    {
        if ($theme->is_default == 1) {
            return redirect('/admin/themes')->with('error', 'Default theme cannot be deleted');
        }

        $theme->delete();
        return redirect('/admin/themes');
    }
}
