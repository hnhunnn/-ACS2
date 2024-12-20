<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    //
    public function manageUsers()
    {
        $users = User::all(); // Lấy tất cả người dùng từ bảng User
        return view('admin.dashboard', compact('users'));
    }

    // Hiển thị form thêm người dùng
    public function create()
    {
        return view('admin.addUser'); // Tên view là file addUser.blade.php
    }

    //XỬ LÝ THÊM NGƯỜI DÙNG 
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'username' => 'required|unique:user,username|max:255', // Thay 'users' bằng 'user'
            'email' => 'required|email|unique:user,email', // Thay 'users' bằng 'user'
            'password' => 'required|min:6',
            'name' => 'required|max:255',
            'phone' => 'required|numeric',
            'userType' => 'required|in:Khách hàng,Quản trị viên',
        ]);
    
        // Tạo người dùng mới
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'phone' => $request->phone,
            'role' => $request->userType,
        ]);
    
        // Chuyển hướng về trang quản lý người dùng với thông báo
        return redirect()->route('admin.dashboard')->with('success', 'Thêm người dùng thành công!');
    }
    
    // XỬ LÝ XÓA NGƯỜI DÙNGDÙNG
    public function destroy($id)
{
    // Tìm người dùng theo ID và xóa
    $user = User::find($id);
    
    if ($user) {
        $user->delete(); // Xóa người dùng
        return redirect()->route('admin.dashboard')->with('success', 'Xóa người dùng thành công!');
    }

    return redirect()->route('admin.dashboard')->with('error', 'Người dùng không tồn tại.');
}

// CHỈNH SỬA NGƯỜI DÙNG
// Hiển thị form chỉnh sửa người dùng
public function edit($id)
{
    // Tìm người dùng theo id
    $user = User::find($id);

    // Kiểm tra nếu người dùng tồn tại
    if (!$user) {
        return redirect()->route('admin.dashboard')->with('error', 'Người dùng không tồn tại');
    }

    // Truyền biến $user vào view
    return view('admin.editUser', compact('user'));
}


// Xử lý cập nhật thông tin người dùng
public function updateUser(Request $request, $id)
{
    // Xác thực dữ liệu người dùng
    $validated = $request->validate([
        'username' => 'required|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|max:15',
        'user_type' => 'required',
        'password' => 'nullable|min:6',
    ]);

    $user = User::findOrFail($id); // Lấy thông tin người dùng theo ID
    $user->username = $request->input('username');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->user_type = $request->input('user_type');
    
    // Nếu người dùng nhập mật khẩu mới, cập nhật mật khẩu
    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
    }

    $user->save(); // Lưu thông tin người dùng đã cập nhật

    return redirect()->route('admin.dashboard')->with('success', 'Thông tin người dùng đã được cập nhật');
}
// TÌM NGƯỜI DÙNG 
//  public function index(Request $request)
//  {
//      $search = $request->input('search'); // Lấy từ khóa tìm kiếm

//      $users = User::when($search, function($query) use ($search) {
//          $query->where('name', 'like', "%$search%")
//                ->orWhere('email', 'like', "%$search%")
//                ->orWhere('username', 'like', "%$search%");
//      })->paginate(10); // Phân trang (tuỳ chọn)

//      return view('admin.dashboard', compact('users'));
//  }

//  // Phương thức tìm kiếm người dùng (nếu bạn muốn tách riêng search ra khỏi index)
//  public function search(Request $request)
//  {
//      $search = $request->input('search'); // Nhận từ khóa tìm kiếm

//      $users = User::where('name', 'like', "%$search%")
//                   ->orWhere('email', 'like', "%$search%")
//                   ->orWhere('username', 'like', "%$search%")
//                   ->get(); // Lấy tất cả người dùng khớp với tìm kiếm

//      return view('admin.dashboard', compact('users')); // Trả lại kết quả tìm kiếm
//  }
 
}
