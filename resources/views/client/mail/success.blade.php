
<div style="width: 600px; margin: 0 auto">
    <div style="text-align: center">
        <h1>VTNN - Hai Lúa</h1>
        <h3>Cảm ơn đã bạn sử dụng sản phẩm của chúng tôi. <br>Đơn hàng của bạn sẽ được vận chuyển trong 1-2 ngày.</h3><br>
        <h1>Đơn đặt hàng của bạn</h1>
    </div>
    <div>
        <ul>
            <li><span>Ngày đặt hàng: <strong>{{ $bill->created_at }}</strong></span></li>
            <li><span>Tên khách hàng: <strong>{{ $customer->name }}</strong></span></li>
            <li><span>Số điện thoại: <strong>{{ $customer->phone }}</strong></span></li>
            <li><span>Địa chỉ nhận hàng: <strong>{{ $customer->address }}</strong></span></li>
            <li><span>Ghi chú: <strong>{{ $customer->note }}</strong></span></li>
        </ul>
        <table style="width:100%; border: 1px solid black; border-collapse: collapse; text-align: center">
            <thead>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                @php $stt = 1; @endphp
                @foreach ($detail_bill as $item)
                <tbody>
                    <tr>
                        <td>{{ $stt++; }}</td>                                        
                        <td>{{ $item->product->name }}</td>
                        <td><img src="{{ $message->embed(public_path().$item->product->image) }}" width="80px" height="80px" alt=""></td>  
                        <td>{{ number_format($item->product->price, 0, '', '.') }} đ</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->quantity * $item->product->price, 0, '', '.') }} đ</td>
                    </tr>
                </tbody>
                @endforeach
            </thead>
        </table>
        <h2>Tổng Cộng: <strong>{{ number_format($bill->total_price, 0, '', '.') }}</strong></h2>
    </div>
</div>
    
