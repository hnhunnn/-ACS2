@extends('layouts.app')

@section('title', 'Chọn ghế')

@section('content')
<br>
<div class="container">
    <div class="row">
        <!-- Khu vực màn hình -->
        <div class="col-12 text-center mb-4">
            <h3>Màn hình</h3>
            <div style="background-color: orange; width: 100%; height: 20px;"></div>
        </div>

        <!-- Khu vực phân loại ghế -->
        <div class="col-12 mb-4">
            <h5 class="text-center">Phân loại ghế</h5>
            <table class="table table-dark table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Ghế</th>
                        <th class="text-center">Phân loại</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">
                            <div style="width: 30px; height: 30px; background-color: white; border: 1px solid #ccc; margin: auto;"></div>
                        </td>
                        <td>Ghế thường</td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <div style="width: 30px; height: 30px; background-color: orange; border: 1px solid #ccc; margin: auto;"></div>
                        </td>
                        <td>Ghế VIP</td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <div style="width: 30px; height: 30px; background-color: green; border: 1px solid #ccc; margin: auto;"></div>
                        </td>
                        <td>Ghế đang chọn bởi bạn (Click lần 1 để chọn, lần 2 để hủy)</td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <div style="width: 30px; height: 30px; background-color: yellow; border: 1px solid #ccc; margin: auto;"></div>
                        </td>
                        <td>Ghế đã đặt</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Khu vực ghế ngồi -->
        <div class="col-12 text-center">
            <div class="seat-selection">
                @for ($i = 1; $i <= 128; $i++)
                    <button 
                        class="seat 
                            @if($i >= 97 && $i <= 128) vip 
                            @else normal @endif" 
                        data-seat="{{ $i }}">
                        {{ $i }}
                    </button>
                    @if ($i % 16 == 0) <br> @endif
                @endfor
            </div>
        </div>
         <br>
        <div style="background-color: orange; width: 100%; height: 20px;"></div>
        <br>
        <!-- Khu vực thanh toán -->
        <div class="col-12 mt-4">
            <div class="payment-info text-right p-3" style="background-color: #222; color: #fff;">
                <h4 class="text-success">THANH TOÁN</h4>
                <h3 class="text-success">324.000đ</h3>
                <p><strong>House of Dragon</strong></p>
                <p>Địa điểm: BHD Star Cineplex - 3/2 - Rạp 5</p>
                <p>Ngày chiếu: 30/07/2022 - 09:07</p>
                <p>Ghế: <span class="text-danger selected-seats">[88] [89] [90]</span></p>
                <p>Email: 321321321321@gmail.com</p>
                <p>Phone: 0123456789</p>
                <button class="btn btn-success">Đặt</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const seats = document.querySelectorAll('.seat');
        const selectedSeats = document.querySelector('.selected-seats');
        const selectedSeatsList = [];

        seats.forEach(seat => {
            seat.addEventListener('click', () => {
                const seatNumber = parseInt(seat.getAttribute('data-seat'), 10); // Chuyển seatNumber thành số nguyên

                if (seat.classList.contains('reserved')) return;

                // Xử lý ghế từ 1 đến 96
                if (seatNumber >= 1 && seatNumber <= 96) {
                    if (seat.classList.contains('selected')) {
                        seat.classList.remove('selected');
                        seat.classList.add('normal');
                        const index = selectedSeatsList.indexOf(seatNumber);
                        if (index !== -1) selectedSeatsList.splice(index, 1);
                    } else {
                        seat.classList.remove('normal');
                        seat.classList.add('selected');
                        selectedSeatsList.push(seatNumber);
                    }
                }

                // Xử lý ghế từ 97 đến 128 (ghế VIP)
                else if (seatNumber >= 97 && seatNumber <= 128) {
                    if (seat.classList.contains('selected')) {
                        seat.classList.remove('selected');
                        seat.classList.add('vip');
                        const index = selectedSeatsList.indexOf(seatNumber);
                        if (index !== -1) selectedSeatsList.splice(index, 1);
                    } else if (seat.classList.contains('vip')) {
                        seat.classList.remove('vip');
                        seat.classList.add('selected');
                        selectedSeatsList.push(seatNumber);
                    }
                }

                // Cập nhật danh sách ghế đã chọn
                selectedSeats.textContent = selectedSeatsList.map(num => `[${num}]`).join(' ');
            });
        });
    });
</script>
    


@endsection
