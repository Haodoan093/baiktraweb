<?php

namespace App\Http\Controllers;

use App\Models\Sach;
use Illuminate\Http\Request;


class SachController extends Controller
{
    public function index() {
        $sachs = Sach::all();
        return view('sach.index', compact('sachs'));
    }

    public function create() {
        return view('sach.create');
    }

    public function store(Request $request) {
        Sach::create($request->all());
        return redirect()->route('sach.index')->with('success', 'Sách đã được thêm thành công!');
    }
}