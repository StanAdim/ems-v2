<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $invoice->name }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="{{ Vite::asset('resources/fonts/ibm-plex-sans/ibm-plex-sans.css') }}" rel="stylesheet">

    <style type="text/css" media="screen">
        .ibm-plex-sans-thin {
            font-family: "IBM Plex Sans", sans-serif;
            font-weight: 100;
            font-style: normal;
        }

        .ibm-plex-sans-extralight {
            font-family: "IBM Plex Sans", sans-serif;
            font-weight: 200;
            font-style: normal;
        }

        .ibm-plex-sans-light {
            font-family: "IBM Plex Sans", sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .ibm-plex-sans-regular {
            font-family: "IBM Plex Sans", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .ibm-plex-sans-medium {
            font-family: "IBM Plex Sans", sans-serif;
            font-weight: 500;
            font-style: normal;
        }

        .ibm-plex-sans-semibold {
            font-family: "IBM Plex Sans", sans-serif;
            font-weight: 600;
            font-style: normal;
        }

        .ibm-plex-sans-bold {
            font-family: "IBM Plex Sans", sans-serif;
            font-weight: 700;
            font-style: normal;
        }

        .ibm-plex-sans-thin-italic {
            font-family: "IBM Plex Sans", sans-serif;
            font-weight: 100;
            font-style: italic;
        }

        .ibm-plex-sans-extralight-italic {
            font-family: "IBM Plex Sans", sans-serif;
            font-weight: 200;
            font-style: italic;
        }

        .ibm-plex-sans-light-italic {
            font-family: "IBM Plex Sans", sans-serif;
            font-weight: 300;
            font-style: italic;
        }

        .ibm-plex-sans-regular-italic {
            font-family: "IBM Plex Sans", sans-serif;
            font-weight: 400;
            font-style: italic;
        }

        .ibm-plex-sans-medium-italic {
            font-family: "IBM Plex Sans", sans-serif;
            font-weight: 500;
            font-style: italic;
        }

        .ibm-plex-sans-semibold-italic {
            font-family: "IBM Plex Sans", sans-serif;
            font-weight: 600;
            font-style: italic;
        }

        .ibm-plex-sans-bold-italic {
            font-family: "IBM Plex Sans", sans-serif;
            font-weight: 700;
            font-style: italic;
        }


        html {
            font-family: "IBM Plex Sans", sans-serif;
            line-height: 1.15;
            margin: 0;
        }

        body {
            font-family: "IBM Plex Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
            font-size: 12px;
            margin: 36pt;
        }

        h4 {
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        strong {
            font-weight: bolder;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        table {
            border-collapse: collapse;
        }

        th {
            text-align: inherit;
        }

        h4,
        .h4 {
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }

        h4,
        .h4 {
            font-size: 1.5rem;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.32rem;
            vertical-align: top;
        }

        .table.table-items th,
        .table.table-items td {
            padding: 0.75rem;
            vertical-align: top;
        }


        .table.table-items td {
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .mt-0 {
            margin-top: 0 !important;
        }

        .mb-o {
            margin-bottom: 0 !important;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .pr-0,
        .px-0 {
            padding-right: 0 !important;
        }

        .pl-0,
        .px-0 {
            padding-left: 0 !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }

        .order-details tr {
            margin-top: 0;
        }

        * {
            font-family: "IBM Plex Sans", sans-serif;
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        table,
        th,
        tr,
        td,
        p,
        div {
            line-height: 1.1;
        }

        .party-header {
            font-size: 1.5rem;
            font-weight: 400;
        }

        .total-amount {
            font-size: 16px;
            font-weight: 700;
            color: #0DA3DE;
        }

        .border-0 {
            border: none !important;
        }

        .cool-gray {
            color: #6B7280;
        }

        .logo {
            display: flex;
            justify-items: center;
            align-content: center;
            height: 82px;
        }

        .logo img {
            height: 100%;
        }

        .footer {
            width: 85%;
            text-align: center;
            border-top: 1px solid #000;
            padding: 10px;
            position: fixed;
            bottom: 0;
        }

        .footer p {
            margin: 0;
            font-size: 12px;
        }
    </style>
</head>

<body>
    {{-- Header --}}
    @if ($invoice->logo)
        <div class="logo">
            <img src="{{ $invoice->getLogo() }}" alt="logo">
        </div>
    @endif

    <hr />

    <table class="table" style="width: 450px">
        <tr>
            <td>
                <table class="table" style="width: 300px">
                    <thead>
                        <tr>
                            <td class="border-0 pl-0" width="50%">
                                <h3>Order Details: </h3>
                            </td>
                            <td class="border-0 pl-0"> </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="pt-0">
                            <td class="border-0 pl-0" width="50%">
                                Control Number:
                            </td>
                            <td class="border-0 pl-0">
                                {{ $invoice->buyer->custom_fields['control_no'] }}
                            </td>
                        </tr>
                        <tr class="mt-0">
                            <td class="border-0 pl-0" width="50%">
                                Service Provider Code:
                            </td>
                            <td class="border-0 pl-0">
                                {{ $invoice->seller->spCode }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border-0 pl-0" width="50%">
                                Payer Name:
                            </td>
                            <td class="border-0 pl-0">
                                {{ $invoice->buyer->name }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border-0 pl-0" width="50%">
                                Payer Phone:
                            </td>
                            <td class="border-0 pl-0">
                                {{ $invoice->buyer->custom_fields['phone_number'] }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border-0 pl-0" width="50%">
                                Payer Email:
                            </td>
                            <td class="border-0 pl-0">
                                {{ $invoice->buyer->custom_fields['email'] }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td>
                @if ($invoice->buyer->custom_fields['qr_code'])
                    <div class="qr-code" class="mt-5">
                        <img alt="QR Code" src="data:image/png;base64, {!! base64_encode($invoice->buyer->custom_fields['qr_code']) !!}">
                        <p>SCAN & PAY </p>
                    </div>
                @endif
            </td>
        </tr>
    </table>



    {{-- <table class="mt-5 table">
        <tbody>
            <tr>
                <td class="border-0 pl-0" width="70%">
                    <h4 class="text-uppercase">
                        <strong>{{ $invoice->name }}</strong>
                    </h4>
                </td>
                <td class="border-0 pl-0">
                    @if ($invoice->status)
                        <h4 class="text-uppercase cool-gray">
                            <strong>{{ $invoice->status }}</strong>
                        </h4>
                    @endif
                    <p>{{ __('invoices::invoice.serial') }} <strong>{{ $invoice->getSerialNumber() }}</strong></p>
                    <p>{{ __('invoices::invoice.date') }}: <strong>{{ $invoice->getDate() }}</strong></p>
                </td>
            </tr>
        </tbody>
    </table> --}}

    {{-- Seller - Buyer --}}
    {{-- <table class="table">
        <thead>
            <tr>
                <th class="party-header border-0 pl-0" width="48.5%">
                    {{ __('invoices::invoice.seller') }}
                </th>
                <th class="border-0" width="3%"></th>
                <th class="party-header border-0 pl-0">
                    {{ __('invoices::invoice.buyer') }}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-0">
                    @if ($invoice->seller->name)
                        <p class="seller-name">
                            <strong>{{ $invoice->seller->name }}</strong>
                        </p>
                    @endif

                    @if ($invoice->seller->address)
                        <p class="seller-address">
                            {{ __('invoices::invoice.address') }}: {{ $invoice->seller->address }}
                        </p>
                    @endif

                    @if ($invoice->seller->code)
                        <p class="seller-code">
                            {{ __('invoices::invoice.code') }}: {{ $invoice->seller->code }}
                        </p>
                    @endif

                    @if ($invoice->seller->vat)
                        <p class="seller-vat">
                            {{ __('invoices::invoice.vat') }}: {{ $invoice->seller->vat }}
                        </p>
                    @endif

                    @if ($invoice->seller->phone)
                        <p class="seller-phone">
                            {{ __('invoices::invoice.phone') }}: {{ $invoice->seller->phone }}
                        </p>
                    @endif

                    @foreach ($invoice->seller->custom_fields as $key => $value)
                        <p class="seller-custom-field">
                            {{ ucfirst($key) }}: {{ $value }}
                        </p>
                    @endforeach
                </td>
                <td class="border-0"></td>
                <td class="px-0">
                    @if ($invoice->buyer->name)
                        <p class="buyer-name">
                            <strong>{{ $invoice->buyer->name }}</strong>
                        </p>
                    @endif

                    @if ($invoice->buyer->address)
                        <p class="buyer-address">
                            {{ __('invoices::invoice.address') }}: {{ $invoice->buyer->address }}
                        </p>
                    @endif

                    @if ($invoice->buyer->code)
                        <p class="buyer-code">
                            {{ __('invoices::invoice.code') }}: {{ $invoice->buyer->code }}
                        </p>
                    @endif

                    @if ($invoice->buyer->vat)
                        <p class="buyer-vat">
                            {{ __('invoices::invoice.vat') }}: {{ $invoice->buyer->vat }}
                        </p>
                    @endif

                    @if ($invoice->buyer->phone)
                        <p class="buyer-phone">
                            {{ __('invoices::invoice.phone') }}: {{ $invoice->buyer->phone }}
                        </p>
                    @endif

                    @foreach ($invoice->buyer->custom_fields as $key => $value)
                        <p class="buyer-custom-field">
                            {{ ucfirst($key) }}: {{ $value }}
                        </p>
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table> --}}

    {{-- Table --}}
    <table class="table-items table">
        <thead>
            <tr>
                <th scope="col" class="border-0 pl-0">Activity Description</th>
                <th scope="col" class="border-0 pr-0 text-right">Amount</th>
            </tr>
        </thead>
        <tbody>
            {{-- Items --}}
            @foreach ($invoice->items as $item)
                <tr>
                    <td class="pl-0">
                        {{ $item->title }}

                        @if ($item->description)
                            <p class="cool-gray">{{ $item->description }}</p>
                        @endif
                    </td>

                    <td class="pr-0 text-right">
                        {{ $invoice->formatCurrency($item->sub_total_price) }}
                    </td>
                </tr>
            @endforeach
            {{-- Summary --}}
            <tr>
                <td class="pl-0 text-right"><strong>Total Billed Amount</strong></td>
                <td class="total-amount pr-0 text-right">
                    {{ $invoice->formatCurrency($invoice->total_amount) }}
                </td>
            </tr>
        </tbody>
    </table>

    <table class="mt-5 table">
        <thead>
            <tr>
                <th scope="col" class="border-0"><strong>Due Date:</strong></th>
                <th scope="col" class="border-0"><strong>Issue date:</strong></th>
                <th scope="col" class="border-0"><strong>Prepared by:</strong></th>
                <th scope="col" class="border-0"><strong>Printed by:</strong></th>
                @if ($invoice->status === 'paid')
                    <th scope="col" class="border-0"><strong>Paid on:</strong></th>
                @endif
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border-0">
                    {{ $invoice->getPayUntilDate() }}
                </td>
                <td class="border-0">
                    {{ $invoice->getDate() }}
                </td>
                <td class="border-0">
                    {{ $invoice->seller->name }}
                </td>
                <td class="border-0">
                    {{ $invoice->buyer->name }}
                </td>
                @if ($invoice->status === 'paid')
                    <td class="border-0">
                        {{ $invoice->getCustomData()['paid_at'] }}
                    </td>
                @endif
            </tr>
        </tbody>
    </table>


    {{--  @if ($invoice->notes)
        <p>
            {{ __('invoices::invoice.notes') }}: {!! $invoice->notes !!}
        </p>
    @endif

    <p>
        {{ __('invoices::invoice.amount_in_words') }}: {{ $invoice->getTotalAmountInWords() }}
    </p>
    <p>
        {{ __('invoices::invoice.pay_until') }}: {{ $invoice->getPayUntilDate() }}
    </p> --}}

    <table class="mt-5 table">
        <tbody>
            <tr>
                <th>Jinsi ya kulipa:</th>
                <th>How to pay:</th>
            </tr>
            <tr>
                <td>
                    <strong>1. Kupitia Benki: </strong> <br />
                    Fika tawi lolote au wakala wa Benki ya CRDB,NMB,BOT. Nambari ya kumbukumbu ni
                    {{ $invoice->buyer->custom_fields['control_no'] }}
                </td>
                <td>
                    <strong>1. Via Bank:</strong> <br />
                    Visit any Branch or Bank agent of CRDB,NMB,BOT. Reference number is
                    {{ $invoice->buyer->custom_fields['control_no'] }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>2. Kupitia mitandao ya Simu</strong><br>
                    Ingia kwenye simu ya mtandao husika <br />
                    Chagua 4 (Lipa Bili) <br />
                    Chagua 5 (Malipo ya Serikali) <br />
                    Ingiza <strong>{{ $invoice->buyer->custom_fields['control_no'] }}</strong> kama nambari ya
                    kumbukumbu
                </td>
                <td>
                    <strong>2. Via Mobile Network Operators (MNOs)</strong><br>
                    Go to the respective USSD menu of the MNO <br />
                    Select 4 (Make Payment) <br />
                    Select 5 (Government Payment) <br />
                    Enter <strong>{{ $invoice->buyer->custom_fields['control_no'] }}</strong> as Reference number
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
        <p>www.ictc.go.tz</p>
        </footer>

        <script type="text/php">
            if (isset($pdf) && $PAGE_COUNT > 1) {
                $text = "{{ __('invoices::invoice.page') }} {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width);
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>
</body>

</html>
