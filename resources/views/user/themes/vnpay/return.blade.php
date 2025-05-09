<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>

</head>

<body>
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">VNPAY RESPONSE</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>
                <label>{{ $vnp_TxnRef }}</label>
            </div>
            <div class="form-group">
                <label>Số tiền:</label>
                <label>{{ $vnp_Amount }}</label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label>{{ $vnp_OrderInfo }}</label>
            </div>
            <div class="form-group">
                <label>Mã phản hồi (vnp_ResponseCode):</label>
                <label>{{ $vnp_ResponseCode }}</label>
            </div>
            <div class="form-group">
                <label>Mã GD Tại VNPAY:</label>
                <label>{{ $vnp_TransactionNo }}</label>
            </div>
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label>{{ $vnp_BankCode }}</label>
            </div>
            <div class="form-group">
                <label>Thời gian thanh toán:</label>
                <label>{{ $vnp_PayDate }}</label>
            </div>
            <div class="form-group">
                <label>Kết quả:</label>
                <label>{!! $result !!}</label>
            </div>
        </div>
        <p>&nbsp;</p>
        <footer class="footer">
            <p>© VNPAY {{ date('Y') }}</p>
        </footer>
    </div>
</body>

</html>
