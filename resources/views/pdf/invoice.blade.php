<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Government Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
            box-sizing: border-box;
        }
        .coat-of-arms {
            height: 80px;
            margin-bottom: 10px;
        }
        .bill-container {
            width: 100%;
            max-width: 210mm; /* A4 width */
            margin: auto;
            padding: 10mm; /* Adjusted padding for fitting */
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            box-sizing: border-box; /* Include padding within the width */
        }
        .header {
            text-align: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .header img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }
        .header h1, .header h2, .header h3 {
            margin: 0;
        }
        .header h1 {
            font-size: 18px;
            font-weight: bold;
            margin-top: 5px;
        }
        .header h2 {
            font-size: 16px;
            color: #666;
        }
        .header h3 {
            font-size: 16px;
            color: #000;
            margin-top: 5px;
        }
        .content {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 12px;
        }
        .content .left {
            width: 70%;
        }
        .content .right {
            width: 25%;
            text-align: right;
        }
        .content .right img {
            width: 100%;
        }
        .content .right p {
            font-size: 12px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 12px;

        }
        table td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .total {
            font-weight: bold;
        }
        .footer {
            font-size: 10px;
            display: flex;
            justify-content: space-between;
            padding-top: 10mm;
        }
        .signature {
            height: 40px;
            border-bottom: 1px dotted #000;
            width: 200px;
            margin: 20px 0;
        }
        .qr-code {
            position: absolute;s
            width: 80px; /* Adjusted for better fit */
            max-width: 80px; /* Ensures the QR code stays within the page */
            margin-top: 20px;
            top: 200px;
            right:10px;
        }
        .signature-img {
            position: relative;
            left: 120px;
            top: 40px;
        }
        .signature-img img{
            height: 100px;
            width: 100px
        }
    </style>
</head>
<body>
    <div class="bill-container">
        <div class="header">
            <img src="{{Vite::asset('resources/images/coat_of_arms.png')}}" alt="Coat of Arms" class="coat-of-arms">
            <h1>United Republic of Tanzania</h1>
            <h2>Information and Communication Technologies Commission</h2>
            <h3>Government Bill</h3>
        </div>
        <div class="content">
            <div class="left">
                <p><strong>Control Number:</strong> {{$order->control_no}}</p>
                {{-- <p><strong>Bill Ref:</strong> {{$bill_data->ReqId}}</p> --}}
                {{-- <p><strong>Service Provider Code:</strong> {{env('GEPG_SPCODE')}}</p> --}}
                <p><strong>Payer Name:</strong> {{$customer['name']}}</p>
                <p><strong>Payer Phone:</strong> {{$customer['phone_number']}}</p>
                <p><strong>Bill Description:</strong> {{$order->description}}</p>
            </div>
            <div class="qr-code">
                <img alt="QR Code" src="data:image/png;base64, {!! base64_encode($qrCode) !!}">
                <p>SCAN & PAY </p>
            </div>
        </div>
        <table>
            <tr>
                <td>Billed Item (1)</td>
                <td>{{$order->description}}</td>
                <td>{{$order->amount_to_pay}}</td>
            </tr>
            <tr class="total">
                <td colspan="2">Total Billed Amount</td>
                <td>{{$order->amount_to_pay}} (TZS)</td>
            </tr>
            <tr>
                <td>Amount in Words</td>
                {{-- <td colspan="2">{{numberToWords($order->amount_to_pay)}}</td> --}}
            </tr>
            <tr>
                <td>Expires on</td>
                <td colspan="2">{{ \Carbon\Carbon::parse($order->expires_on)->format('d M Y') }}</td>
            </tr>
            <tr>
                <td>Prepared By</td>
                <td colspan="2">{{$seller['name']}}</td>
            </tr>
            <tr>
                <td>Collection Centre</td>
                <td colspan="2">{{ $seller['address'] }}</td>
            </tr>
            <tr>
                <td>Printed By</td>
                <td colspan="2">{{$customer['name']}}</td>
            </tr>
            <tr>
                <td>Printed on</td>
                <td colspan="2">{{ date('l, F j, Y') }}</td>
            </tr>
            <tr>
                <td>Signature</td>
                <td colspan="2">
                    {{-- <div class="signature-img">
                        <img src="{{public_path('images/dg-signature.png')}}" alt="img-signature" class="coat-of-arms">
                    </div> --}}
                    <div class="signature"></div>
                </td>
            </tr>
        </table>
        <div class="footer">
            <div class="left">
                <p><strong>Jinsi ya Kulipa</strong></p>
                <p>1. Kupitia Benki: Fika tawi lolote au wakala wa benki ya CRDB, NMB, BOT. Namba ya kumbukumbu: {{$order->control_no}}.</p>
                <p>2. Kupitia Mitandao ya Simu: Ingia kwenye menyu ya mtandao husika</p>
                <p>- Chagua 4 (Lipa Bili)</p>
                <p>- Chagua 5 (Malipo ya Serikali)</p>
                <p>- Ingiza {{$order->control_no}} kama namba ya kumbukumbu</p>
            </div>
            <div class="right">
                <p><strong>How to Pay</strong></p>
                <p>1. Via Bank: Visit any branch or bank agent of CRDB, NMB, BOT. Reference Number: {{$order->control_no}}.</p>
                <p>2. Via Mobile Network Operators (MNO): Enter to the respective USSD Menu of MNO</p>
                <p>- Select 4 (Make Payments)</p>
                <p>- Select 5 (Government Payments)</p>
                <p>- Enter {{$order->control_no}} as reference number</p>
            </div>
        </div>
    </div>
</body>
</html>
