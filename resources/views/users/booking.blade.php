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
                        <td>Ghế đang chọn bởi bạn (Click lần 1 để chọn, lần 2 để xóa)</td>
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
                            @if(in_array($i, [35, 37, 88, 89, 90])) {{ $i == 88 || $i == 89 || $i == 90 ? 'selected' : 'reserved' }} @endif" 
                        @if(in_array($i, [35, 37])) disabled @endif>
                        {{ $i }}
                    </button>
                    @if ($i % 16 == 0) <br> @endif
                @endfor
            </div>
        </div> <br>
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
                <p>Ghế: <span class="text-danger">[88] [89] [90]</span></p>
                <p>Email: 321321321321@gmail.com</p>
                <p>Phone: 0123456789</p>
                <button class="btn btn-success">Đặt</button>
            </div>
        </div>
    </div>
</div>
@endsection