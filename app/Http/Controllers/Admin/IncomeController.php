<?php

namespace App\Http\Controllers\Admin;

use App\Models\Income;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncomeController extends Controller {
    
    // Hiển thị danh sách tất cả doanh thu
    public function index()
    {
        $incomes = Income::all();
        return view('admin.themes.incomes.tableIncome', compact('incomes'));
    }

    // Hiển thị chi tiết một doanh thu
    public function show($id)
    {
        $income = Income::findOrFail($id);
        return view('admin.themes.incomes.incomeDetail', compact('income'));
    }

    // Hiển thị form tạo doanh thu mới
    public function create()
    {
        return view('admin.themes.incomes.createIncome');
    }

    // Lưu doanh thu mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'total_buyer' => 'required|integer|min:0',
            'total_amount' => 'required|numeric|min:0',
            'time' => 'required|date',
        ]);

        Income::create([
            'total_buyer' => $request->total_buyer,
            'total_amount' => $request->total_amount,
            'time' => strtotime($request->time),
        ]);

        return redirect()->route('admin.incomes.index')->with('success', 'Doanh thu đã được thêm thành công');
    }

    // Hiển thị form chỉnh sửa doanh thu
    public function edit($id)
    {
        $income = Income::findOrFail($id);
        return view('admin.themes.incomes.editIncome', compact('income'));
    }

    // Cập nhật thông tin doanh thu
    public function update(Request $request, $id)
    {
        $request->validate([
            'total_buyer' => 'required|integer|min:0',
            'total_amount' => 'required|numeric|min:0',
            'time' => 'required|date',
        ]);

        $income = Income::findOrFail($id);
        $income->update([
            'total_buyer' => $request->total_buyer,
            'total_amount' => $request->total_amount,
            'time' => strtotime($request->time),
        ]);

        return redirect()->route('admin.incomes.index')->with('success', 'Thông tin doanh thu đã được cập nhật');
    }

    // Xóa một doanh thu
    public function destroy($id)
    {
        $income = Income::findOrFail($id);
        $income->delete();
        return redirect()->route('admin.incomes.index')->with('success', 'Doanh thu đã được xóa');
    }
}
