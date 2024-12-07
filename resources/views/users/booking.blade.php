@extends('layouts.app')

@section('title', 'Chọn ghế')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <!-- Khu vực màn hình -->
            <div class="col-12 text-center mb-4">
                <h3 style="color:white">Màn hình</h3>
                <div style="background-color: orange; width: 100%; height: 20px;"></div>
            </div>

            <!-- Chia bố cục làm hai phần -->
            <div class="col-12">
                <div class="row">
                    <!-- Bên trái: Phân loại ghế + Thanh toán -->
                    <div class="col-md-4">
                        <!-- Khu vực phân loại ghế -->
                        <div class="mb-4">
                            <h5 class="text-center" style="color:white">Phân loại ghế</h5>
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
                                            <div
                                                style="width: 30px; height: 30px; background-color: white; border: 1px solid #ccc; margin: auto;">
                                            </div>
                                        </td>
                                        <td>Ghế thường</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div
                                                style="width: 30px; height: 30px; background-color: orange; border: 1px solid #ccc; margin: auto;">
                                            </div>
                                        </td>
                                        <td>Ghế VIP</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div
                                                style="width: 30px; height: 30px; background-color: green; border: 1px solid #ccc; margin: auto;">
                                            </div>
                                        </td>
                                        <td>Ghế đang chọn bởi bạn (Click lần 1 để chọn, lần 2 để hủy)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div
                                                style="width: 30px; height: 30px; background-color: yellow; border: 1px solid #ccc; margin: auto;">
                                            </div>
                                        </td>
                                        <td>Ghế đã đặt</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Khu vực thanh toán -->
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

                    <!-- Bên phải: Khu vực ghế ngồi -->
                    <div class="col-md-8 text-center">
                        <div class="seat-selection">
                            @for ($i = 1; $i <= 104; $i++)
                                <button
                                    class="seat 
                                    @if ($i >= 79 && $i <= 104) vip 
                                    @else normal @endif"
                                    data-seat="{{ $i }}">
                                    {{ $i }}
                                </button>
                                @if ($i % 13 == 0)
                                    <br>
                                @endif
                            @endfor
                        </div>
                    </div>

                </div>
            </div>

            <!-- Khu vực kết thúc màn hình -->
            {{-- <div class="col-12 mt-4">
            <div style="background-color: orange; width: 100%; height: 20px;"></div>
        </div> --}}
        </div>
    </div>
    <br>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const seats = document.querySelectorAll('.seat');
            const selectedSeats = document.querySelector('.selected-seats');
            const selectedSeatsList = [];

            seats.forEach(seat => {
                seat.addEventListener('click', () => {
                    const seatNumber = parseInt(seat.getAttribute('data-seat'), 10);

                    if (seat.classList.contains('reserved')) return;

                    if (seat.classList.contains('selected')) {
                        seat.classList.remove('selected');
                        seat.classList.add(seatNumber >= 97 ? 'vip' : 'normal');
                        const index = selectedSeatsList.indexOf(seatNumber);
                        if (index !== -1) selectedSeatsList.splice(index, 1);
                    } else {
                        seat.classList.remove(seatNumber >= 97 ? 'vip' : 'normal');
                        seat.classList.add('selected');
                        selectedSeatsList.push(seatNumber);
                    }

                    selectedSeats.textContent = selectedSeatsList.map(num => `[${num}]`).join(' ');
                });
            });
        });
    </script>
@endsection
