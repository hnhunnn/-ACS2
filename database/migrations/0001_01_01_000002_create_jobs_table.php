<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        // tạo các bảng

        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default(""); //tên ngdung
            $table->string('username'); //tài khoản
            $table->string('password'); //mật khẩu
            $table->string('email'); //email
            $table->string('phone')->default("");  //sdt
            $table->enum('role', ['Khách hàng', 'Quản trị viên']); // vai trò(qtv/ngdung)
            $table->timestamps();
        });

        Schema::create('movie', function (Blueprint $table) {
            $table->bigIncrements('id');  // Tạo khóa chính tự động tăng cho mã phim
            $table->string('image_path'); // đường dẫn ảnh
            $table->string('movieName'); //tên phim
            $table->text('description'); //mô tả phim
            $table->string('trailer_url')->nullable(); // URL trailer
            $table->boolean('showing')->default(0);//0:sắp chiếu 1:đang chiếu
            $table->date('release_date')->nullable(); // Ngày khởi chiếu
            $table->timestamps();  //Thời gian tạo và cập nhật
        });

        Schema::create('cinema', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->string('cinemaName'); // Tên rạp 
            $table->string('logo')->nullable(); // Đường dẫn đến logo          
           // $table->string('address'); địa chỉ rạp
            $table->timestamps();  //Thời gian tạo và cập nhật
        });
        Schema::create('branch', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cinema_id'); // Khóa ngoại đến bảng cinema
            $table->string('branchName');
            $table->string('address');
            $table->timestamps();
            
            // Ràng buộc khóa ngoại
            $table->foreign('cinema_id')->references('id')->on('cinema')->onDelete('cascade');

        });
        Schema::create('schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id'); // Khóa ngoại tới branch
            $table->unsignedBigInteger('movie_id'); // Kha ngoại tới movie
            $table->json('showtime');
            $table->timestamps();
        
            // Ràng buộc khóa ngoại
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on(table: 'movie')->onDelete('cascade');

        });
        
        Schema::create('seat', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->unsignedBigInteger('cinema_id'); // Khóa ngoại đến bảng cinemas
            $table->string('number'); // Số ghế
            $table->enum('type', ['Thường', 'VIP']); // Loại ghế
            $table->boolean('is_available')->default(true); // Trạng thái ghế
            $table->unsignedBigInteger('movie_id');
            // Ràng buộc khóa ngoại
            $table->foreign('cinema_id')->references('id')->on('cinema')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movie')->onDelete('cascade');

            $table->timestamps();
        });


        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Khóa ngoại tới users
            $table->unsignedBigInteger('movie_id'); // Khóa ngoại tới movies
            $table->unsignedBigInteger('seat_id'); // Khóa ngoại tới seats
            $table->time('booking_time'); // thời gian đặt vé
            $table->date('booking_date'); // Ngày đặt vé

            // Ràng buộc khóa ngoại
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movie')->onDelete('cascade');
            $table->foreign('seat_id')->references('id')->on('seat')->onDelete('cascade');
            $table->unique(['movie_id', 'seat_id']); // Đảm bảo không trùng đặt ghế cho cùng một phim
            
            $table->timestamps();  // Thời gian tạo và cập nhật bản ghi

        });
        Schema::create('payment', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->unsignedBigInteger('booking_id'); // Khóa ngoại tới bookings
            $table->decimal('amount', 8, 2); // Số tiền thanh toán
            $table->enum('status', ['Đã thanh toán', 'Chưa thanh toán']); // Trạng thái
    
            // Ràng buộc khóa ngoại
            $table->foreign('booking_id')->references('id')->on('booking')->onDelete('cascade');
    
            $table->timestamps();
        });

        Schema::create('ticket', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->unsignedBigInteger('booking_id'); // Khóa ngoại tới bookings
            $table->unsignedBigInteger('seat_id'); // Khóa ngoại tới seats
            $table->decimal('price', 8, 2); // Giá vé
            $table->enum('ticket_type', ['Thường', 'VIP']); // Loại vé
            $table->timestamp('issued_at')->nullable(); // Thời gian phát hành vé
    
            // Ràng buộc khóa ngoại
            $table->foreign('booking_id')->references('id')->on('booking')->onDelete('cascade');
            $table->foreign('seat_id')->references('id')->on('seat')->onDelete('cascade');
    
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
        Schema::dropIfExists('payment');
        Schema::dropIfExists('booking');
        Schema::dropIfExists('seat');
        Schema::dropIfExists('schedule');
        Schema::dropIfExists('branch');
        Schema::dropIfExists('cinema');
        Schema::dropIfExists('movie');
        Schema::dropIfExists('user');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('jobs');
    }
    
};
