<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    #invoice{
        padding: 30px;
    }

    .invoice {
        position: relative;
        background-color: #FFF;
        min-height: 680px;
        padding: 15px
    }

    .invoice header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #3989c6
    }

    .invoice .company-details {
        text-align: right
    }

    .invoice .company-details .name {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .contacts {
        margin-bottom: 20px
    }

    .invoice .invoice-to {
        text-align: left
    }

    .invoice .invoice-to .to {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .invoice-details {
        text-align: right
    }

    .invoice .invoice-details .invoice-id {
        margin-top: 0;
        color: #3989c6
    }

    .invoice main {
        padding-bottom: 50px
    }

    .invoice main .thanks {
        margin-top: -100px;
        font-size: 2em;
        margin-bottom: 50px
    }

    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #3989c6
    }

    .invoice main .notices .notice {
        font-size: 1.2em
    }

    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px
    }

    .invoice table td,.invoice table th {
        padding: 15px;
        background: #eee;
        border-bottom: 1px solid #fff
    }

    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 16px
    }

    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        color: #3989c6;
        font-size: 1.2em
    }

    .invoice table .qty,.invoice table .total,.invoice table .unit {
        text-align: right;
        font-size: 1.2em
    }

    .invoice table .no {
        color: #fff;
        font-size: 1.6em;
        background: #3989c6
    }

    .invoice table .unit {
        background: #ddd
    }

    .invoice table .total {
        background: #3989c6;
        color: #fff
    }

    .invoice table tbody tr:last-child td {
        border: none
    }

    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 10px 20px;
        font-size: 1.2em;
        border-top: 1px solid #aaa
    }

    .invoice table tfoot tr:first-child td {
        border-top: none
    }

    .invoice table tfoot tr:last-child td {
        color: #3989c6;
        font-size: 1.4em;
        border-top: 1px solid #3989c6
    }

    .invoice table tfoot tr td:first-child {
        border: none
    }

    .invoice footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0
    }

    @media print {
    .invoice {
            font-size: 11px!important;
            overflow: hidden!important
        }

    .invoice footer {
            position: absolute;
            bottom: 10px;
            page-break-after: always
        }

    .invoice>div:last-child {
            page-break-before: always
        }
    }
</style>
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col-6">
                        
                    </div>
                    <div class="col-6 company-details">
                        <img src="{{asset('/public')}}/image/jewel.jpg" height="100px" width="100px" data-holder-rendered="true" />
                        <h2 class="name">
                            Md. Nur Alam Siddique
                        </h2>
                        <div>6/8, Block #C, Pallabi, Mirpur-12</div>
                        <div>01744232195</div>
                        <div>jewel.cse72@gmail.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col-6 invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to">{{$order->order_shipping->first_name.' '.$order->order_shipping->last_name}}</h2>
                        <div class="address">{{$order->order_shipping->address.', '.$order->order_shipping->post_office.', '.$order->order_shipping->thana.', '.$order->order_shipping->district.'-'.$order->order_shipping->post_code}}</div>
                        <div>Phone: {{$order->order_shipping->phone}}</div>
                        <div class="email">Email: {{$order->order_shipping->email}}</div>
                    </div>
                    <div class="col-6 invoice-details">
                        <h5 class="invoice-id">Order Number: {{$order->order_number}}</h5>
                        <div class="date">Date of Order: {{$order->created_at}}</div>
                    </div>
                </div>
                <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th align="left" colspan="2"><strong>Product</strong></th>
                            <th align="left"><strong>Quantity</strong></th>
                            <th align="left"><strong>Total</strong></th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach($order->order_detail as $details)
                            <tr>
                                <td colspan="2"><span>{{$details->product->product_name}}</span></td>
                                <td>x{{$details->product_qty}}</td>

                                @if($details->product->offer_price)
                                <td><strong>Tk. {{$subtotal = $details->product->offer_price*$details->product_qty}}</strong></td>
                                @php $total += $subtotal; @endphp

                                @else
                                <td><strong>Tk.{{$subtotal = $details->product->sell_price*$details->product_qty}}</strong></td>
                                @php $total += $subtotal; @endphp

                                @endif
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="4"><hr></td>
                            </tr>

                            <tr>
                                <td><strong>Subtotal</strong></td>
                                <td colspan="2"></td>
                                <td><strong>Tk. {{$total}}</strong></td>
                            </tr>
                            @php $discountTotal = $total; @endphp
                            @if($order->coupon)
                            <tr>
                                <td colspan="2"><strong>Discount({{$order->coupon->code}})</strong></td>
                                <td></td>

                                @if($order->coupon->type == 'fixed')
                                <td><strong>-Tk. {{$discount = $order->coupon->value}}</strong></td>
                                @php $discountTotal = $total - $discount; @endphp

                                @else
                                <td><strong>-Tk. {{$discount = $total * $order->coupon->value / 100}}</strong></td>
                                @php $discountTotal = $total - $discount; @endphp

                                @endif
                            </tr>
                            @endif

                            <tr>
                                <td colspan="2"><strong>Delivery Charge</strong></td>
                                <td></td>
                                <td><strong>+Tk. {{$deliveryCharge = $order->delivery_charge->value}}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4"><hr></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col" colspan="3"></th>
                                <th align="left" scope="col"><strong>Total: Tk.{{$discountTotal + $deliveryCharge}}<strong></strong></th>
                            </tr>
                        </tfoot>
                      </table>
                      <br>
                      <br>
                      <br><br><br>
                <div class="thanks">Thank you!</div>
            </main>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>