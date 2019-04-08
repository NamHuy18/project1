<div>
    <div></div>
    <h3>Thông tin khách hàng</h3>
    <p>
        <strong>Khách hàng:</strong>
        {{ $info['name'] }}
    </p>
    <p>
        <strong>Email:</strong>
        {{ $info['email'] }}
    </p>
    <p>
        <strong>SĐT:</strong>
        {{ $info['phone_number'] }}
    </p>
    <p>
        <strong>Địa Chỉ:</strong>
        {{ $info['address']}}
    </p>
</div>
<div>
    <h3>Hoá đơn mua hàng</h3>
    <table border="1">
        <tr>
            <td><strong>Tên sản phẩm</strong></td>
            <td><strong>Giá</strong></td>
            <td><strong>Số Lượng</strong></td>
            <td><strong>Thành Tiền</strong></td>
        </tr>       
        @foreach ($cart1 as $ca)
            <tr>
                <td>{{ $ca->name }}</td>
                <td>{{ number_format($ca->price) }} VND</td>
                <td  style="text-align:center">{{ $ca->qty }}</td>
                <td>{{ number_format($ca->price * $ca->qty) }} VND</td>
            </tr>
        @endforeach
        <tr>
            <td>Tổng Tiền:</td>
            <td colspan="3" style="text-align:right">{{ Cart::total() }} VND</td>
        </tr>
    </table>
</div>