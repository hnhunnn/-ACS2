<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\movie;
use Illuminate\Support\Facades\DB;
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
        'role' => 'required',
        'password' => 'nullable|min:6',
    ]);

    $user = User::findOrFail($id); // Lấy thông tin người dùng theo ID
    $user->username = $request->input('username');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->role = $request->input('role'); // Sử dụng đúng cột 'role'

    // Nếu người dùng nhập mật khẩu mới, cập nhật mật khẩu
    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
    }

    $user->save(); // Lưu thông tin người dùng đã cập nhật

    return redirect()->route('admin.dashboard')->with('success', 'Thông tin người dùng đã được cập nhật');
}

public function index2(Request $request)
{
    $search = $request->input('search');

    $users = User::query();

    if ($search) {
        $users = $users->where('name', 'LIKE', "%{$search}%")
                       ->orWhere('username', 'LIKE', "%{$search}%")
                       ->orWhere('email', 'LIKE', "%{$search}%")
                       ->orWhere('phone', 'LIKE', "%{$search}%")
                       ->orWhere('role', 'LIKE', "%{$search}%");
    }

    $users = $users->get();

    return view('admin.dashboard', ['users' => $users]);
}

 


// LIST PHIM
public function index()
{
    // Lấy tất cả dữ liệu từ bảng 'movie'
    $movies = DB::table('movie')->get(); 
    return view('admin.listMovie', compact('movies'));
}

    // XỬ LÝ XÓA PHIM
    public function deleteM($id)
{
    // Tìm người dùng theo ID và xóa
    $movies = movie ::find($id);
    
    if ($movies) {
        $movies->delete(); // Xóa phim
        return redirect()->route('admin.listMovie')->with('success', 'Xóa phim thành công!');
    }

    return redirect()->route('admin.listMovie')->with('error', 'Phim không tồn tại.');
}
    public function listMovie()
{
    $movies = DB::table('movie')->get();
    return view('admin.listMovie', compact('movies'));
}

// SỬA PHIM

public function editM($id)
{
    // Lấy thông tin phim theo ID
    $movie = DB::table('movie')->where('id', $id)->first();

    if (!$movie) {
        return redirect()->route('admin.listMovie')->with('error', 'Không tìm thấy phim!');
    }

    // Trả về view chỉnh sửa phim
    return view('admin.editMovie', compact('movie'));
}
public function updateM(Request $request)
{
    $validatedData = $request->validate([
        'movie_name' => 'required|string|max:255',
        'trailer' => 'nullable|url',
        'description' => 'nullable|string',
        'release_date' => 'nullable|date',
        'movie_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $movie = Movie::findOrFail($request->movie_id);

    // Cập nhật các trường
    $movie->movieName = $validatedData['movie_name'];
    $movie->trailer_url = $validatedData['trailer'];
    $movie->description = $validatedData['description'];
    $movie->release_date = $validatedData['release_date'];
    $movie->showing = $request->has('is_showing') ? 1 : 0;

    // Xử lý ảnh mới nếu có
    if ($request->hasFile('movie_image')) {
        $imagePath = $request->file('movie_image')->store('public/movies');
        $movie->image_path = str_replace('public/', 'storage/', $imagePath);
    }

    $movie->save();

    return redirect()->route('admin.listMovie')->with('success', 'Cập nhật phim thành công.');
}

// THÊM PHIM
public function storeM(Request $request)
    {
        // Validate input
        $request->validate([
            'movie_name' => 'required|string|max:255',
            'trailer_url' => 'nullable|url',
            'description' => 'required|string',
            'release_date' => 'required|date',
            'image_path' => 'required|image',
        ]);

        // Store data
        $movie = new Movie();
        $movie->movieName = $request->input('movie_name');
        $movie->trailer_url = $request->input('trailer_url');
        $movie->description = $request->input('description');
        $movie->release_date = $request->input('release_date');
        $movie->showing = $request->has('is_showing') ? 1 : 0;

        
        // Handle image upload
        // if ($request->hasFile('image_path')) {
        //     $movie->image_path = $request->file('image_path')->store('movies', 'public');
        // }
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $path = $file->store('movies', 'public'); // Lưu ảnh vào 'storage/app/public/images'
            $movie->image_path = 'storage/' . $path; // Lưu đường dẫn ảnh
        }

        $movie->save();

        return redirect()->route('admin.listMovie')->with('success', 'Thêm phim thành công!');
    }

    // TÌM KIẾM PHIM
    public function listMovies(Request $request)
{
    $search = $request->input('search'); // Lấy từ khóa tìm kiếm từ request

    // Tìm kiếm theo tên phim hoặc mô tả
    $movies = Movie::query()
        ->when($search, function ($query, $search) {
            $query->where('movieName', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
        })
        ->get();

    return view('admin.listMovie', compact('movies', 'search'));
}
}