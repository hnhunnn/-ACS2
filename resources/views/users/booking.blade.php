@extends('layouts.app')

@section('title', 'Chọn ghế')

@section('content')
    <div class="containerb">
        <div class="row">
            <!-- Khu vực màn hình -->
            <div class="col-12 text-center mb-4">
                <br>

            </div>

            <!-- Chia bố cục làm hai phần -->
            <div class="col-12">
                <div class="row">
                    <!-- Bên trái: Phân loại ghế + Thanh toán -->
                    <div class="col-md-4">
                        <br> <br>
                        <!-- Khu vực phân loại ghế -->
                        <div class="mb-4">
                            <h5 class="text-center" style="color: white">Phân loại ghế</h5>
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
                                        <td>Ghế đang chọn bởi bạn</td>
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
                        <div class="payment-info p-3" style="background-color: #222; color: white;">
                            <h4 class="text-success">THANH TOÁN</h4>
                            <h3 class="text-success total-price">0 VNĐ</h3>
                            <p>Tên phim: {{ $movie->movieName }}</p>
                            <p>Địa điểm: <span id="location">{{ $branch->address }}</span></p>
                            <p>Ngày chiếu: <span id="date">{{ $movie->release_date }}</span></p>

                            <!-- Dropdown chọn giờ chiếu -->
                            <p>Chọn giờ chiếu:
                                <select id="timeSelect" class="form-select">
                                    <option value="">Chọn giờ chiếu</option>
                                    @foreach ($showtimes as $time)
                                        <option value="{{ $time }}">{{ $time }}</option>
                                    @endforeach
                                </select>
                            </p>

                            <p>Giờ đã chọn: <span id="selectedTime" class="text-primary">Chưa chọn</span></p>
                            <p>Ghế: <span class="text-danger selected-seats">Chưa chọn</span></p>
                            <button class="btn btn-success" id="confirmBooking" data-movie-id="{{ $movie->id }} ">Đặt
                                chỗ</button>
                        </div>


                    </div>

                  <!-- Bên phải: Khu vực ghế ngồi -->
                  <div class="col-md-8 text-center">
                    <h3 style="color: white">Màn hình</h3>
                    <div style="background-color: orange; width: 80%; height: 10px; margin-left: 85px"></div><br>
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
        </div>
    </div>
    <br>

@endsection

@section('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const seats = document.querySelectorAll('.seat');
            const selectedSeatsElement = document.querySelector('.selected-seats');
            const totalPriceElement = document.querySelector('.total-price');
            const confirmButton = document.querySelector('#confirmBooking');
            const movieId = confirmButton.getAttribute('data-movie-id');

            const selectedSeats = [];
            const seatPrice = {
                normal: 50000,
                vip: 80000
            };

            function updatePaymentInfo() {
                const total = selectedSeats.reduce((sum, seat) => sum + seatPrice[seat.type], 0);

                selectedSeatsElement.textContent = selectedSeats
                    .map(seat => `[${seat.number}]`)
                    .join(', ') || 'Chưa chọn';

                totalPriceElement.textContent = `${total.toLocaleString()} VNĐ`;
            }

            seats.forEach(seat => {
                seat.addEventListener('click', () => {
                    const seatNumber = parseInt(seat.getAttribute('data-seat'), 10);
                    const seatType = seat.classList.contains('vip') ? 'vip' : 'normal';

                    if (seat.classList.contains('reserved')) {
                        alert('Ghế này đã được đặt!');
                        return;
                    }

                    if (seat.classList.contains('selected')) {
                        seat.classList.remove('selected');
                        const index = selectedSeats.findIndex(s => s.number === seatNumber);
                        if (index !== -1) selectedSeats.splice(index, 1);
                    } else {
                        seat.classList.add('selected');
                        selectedSeats.push({
                            number: seatNumber,
                            type: seatType
                        });
                    }

                    updatePaymentInfo();
                });
            });

            confirmButton.addEventListener('click', () => {
                if (selectedSeats.length === 0) {
                    alert('Vui lòng chọn ghế trước khi đặt vé!');
                    return;
                }

                const selectedSeatIds = selectedSeats.map(seat => seat.number);

                fetch(`/movies/${movieId}/book-seats`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            seats: selectedSeatIds
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            window.location.reload();
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Lỗi:', error);
                        alert('Không thể gửi yêu cầu đặt vé.');
                    });
            });



            // Xử lý hiển thị giờ chiếu đã chọn
            document.getElementById('timeSelect').addEventListener('change', function() {
                const selectedTime = this.value;
                document.getElementById('selectedTime').innerText = selectedTime || 'Chưa chọn';
            });

        })
    </script>
@endsection