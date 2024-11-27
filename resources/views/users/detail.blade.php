@extends('layouts.app')

@section('title', 'Chọn ghế')

@section('content')

        <div class="nen">
            <img src="../img/bgrInside2.png" class="background">
            <img src="../img/inside2.png" class="inside2">
            <p class="tieu_de_phim">Inside Out 2:</p>
            <p class="mo_ta_phim">Cảm xúc cũng trưởng thành và mắc sai lầm (nhưng không sao cả)
                Mỗi cảm xúc trong ta không tự sinh ra cũng không tự mất đi, nó luôn ở đó và trưởng thành sau ngàn lần đấu tranh.Tác phẩm do Kelsey Mann đạo diễn, lấy bối cảnh hai năm sau các sự kiện ở phần đầu. Riley (Amy Poehler lồng tiếng) lúc này bước sang tuổi 13, có nhiều thay đổi về tâm sinh lý. Năm cảm xúc Joy (Vui Vẻ), Sadness (Buồn Bã), Anger (Giận Dữ), Fear (Sợ Hãi) và Disgust (Ghê Tởm) sẽ cùng cô bạn đồng hành trải qua tuổi dậy thì.</p>
            <nav>
                <ul class="menu_tt">
                    <li><a href="#">Lịch chiếu</a></li>
                    <li><a href="#">Thông tin</a></li>
                    <li><a href="#">Đánh giá</a></li>
                </ul>
                <div class="horizontal-line"></div> 
            </nav>
            <div class="showtimes">
                <div class="showtime"><a href="#">7:00 AM</a></div>
                <div class="showtime"><a href="#">9:00 AM</a></div>
                <div class="showtime"><a href="#">1:00 PM</a></div>
                <div class="showtime"><a href="#">5:00 PM</a></div>
                <div class="showtime"><a href="#">8:00 PM</a></div>
                <div class="showtime"><a href="#">10:00 PM</a></div>
            </div>
        </div>
@endsection

