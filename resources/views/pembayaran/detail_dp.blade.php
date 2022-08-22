@extends('layouts.v_main')

@section('container')
    <?php
    $total_ammount = 0;
    ?>
    {{-- <h1>Pembayaran</h1> --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h3 style="text-align: center"><b>Nota Pembayaran</b></h3>
                                <h4 style="text-align: center"><i>Down Payment</i></h4>
                                <h4>
                                    {{-- <i class="fas fa-globe"></i> --}}
                                    <b>FastPrint</b>
                                    <small class="float-right"><b>Bandung</b></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>Admin FP</strong><br>
                                    Jl. Cangkuang Kulon No.33<br>
                                    Kec. Dayeuhkolot, Kab. Bandung<br>
                                    Phone: (022) 40239<br>
                                    Email: fastprintbdg1@gmail.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>Customer</strong><br>
                                    {{ $invoice->pemesanan->customer }}<br>
                                    {{ $invoice->pemesanan->address }}<br>
                                    {{ $invoice->pemesanan->phone }}<br>

                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice</b> <b style="font-size: 19px">&emsp;: {{ $invoice->no_inv }}</b><br>
                                <br>
                                <b>No PO</b> <b style="font-size: 18px">&emsp;&emsp;&ensp; :
                                    {{ $invoice->pemesanan->no_po }}</b><br>
                                <b>Payment Due :</b> {{ $invoice->created_at }}<br>
                                <b>Tim &emsp;&emsp;&emsp;&emsp; :</b> {{ $invoice->pemesanan->team }}
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>Produk</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Satuan</th>
                                            <th>Ammount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width: 50%">
                                                {{ $invoice->pemesanan->tipe->service_name }} +
                                                {{ $invoice->pemesanan->bahan->material_name }}<br>

                                                {{ $invoice->pemesanan->team }}<br>
                                                {{ $invoice->pemesanan->caption }}<br>
                                                Detail Ukuran<br>

                                                {{-- Tanpa Lengan --}}
                                                {{ @$dosz->sz_s == null ? '' : 'Size S T.Lengan : ' . @$dosz->sz_s . ' pcs,' }}&emsp;&emsp;
                                                {{ @$dosz->sz_m == null ? '' : 'Size M T.Lengan : ' . @$dosz->sz_m . ' pcs,' }}&emsp;&emsp;
                                                {{ @$dosz->sz_l == null ? '' : 'Size L T.Lengan : ' . @$dosz->sz_l . ' pcs,' }}<br>

                                                {{ @$dosz->sz_xl == null ? '' : 'Size XL T.Lengan : ' . @$dosz->sz_xl . ' pcs,' }}&emsp;&emsp;
                                                {{ @$dosz->sz_2xl == null ? '' : 'Size 2XL T.Lengan : ' . @$dosz->sz_2xl . ' pcs,' }}&emsp;&emsp;
                                                {{ @$dosz->sz_3xl == null ? '' : 'Size 3XL T.Lengan : ' . @$dosz->sz_3xl . ' pcs,' }}<br>

                                                {{ @$dosz->sz_4xl == null ? '' : 'Size 4XL T.Lengan : ' . @$dosz->sz_4xl . ' pcs,' }}

                                                {{-- lengan pendek --}}
                                                {{ @$doszs->szs_s == null ? '' : 'Size S Pendek : ' . @$doszs->szs_s . ' pcs,' }}&emsp;&emsp;
                                                {{ @$doszs->szs_m == null ? '' : 'Size S Pendek : ' . @$doszs->szs_m . ' pcs,' }}&emsp;&emsp;
                                                {{ @$doszs->szs_l == null ? '' : 'Size S Pendek : ' . @$doszs->szs_l . ' pcs,' }}<br>

                                                {{ @$doszs->szs_xl == null ? '' : 'Size S Pendek : ' . @$doszs->szs_xl . ' pcs,' }}&emsp;&emsp;
                                                {{ @$doszs->szs_2xl == null ? '' : 'Size S Pendek : ' . @$doszs->szs_2xl . ' pcs,' }}&emsp;&emsp;
                                                {{ @$doszs->szs_3xl == null ? '' : 'Size S Pendek : ' . @$doszs->szs_3xl . ' pcs,' }}<br>

                                                {{ @$doszs->szs_4xl == null ? '' : 'Size S Pendek : ' . @$doszs->szs_4xl . ' pcs,' }}

                                                {{-- @if ($doszs->szs_s == null)
                                                    {{@$doszs->szs_s}}
                                                @else
                                                    Size S Pendek : {{@$doszs->szs_s}} pcs,&emsp;&emsp;
                                                @endif --}}

                                                {{-- lengan panjang --}}
                                                <br><br>
                                                {{ @$doszl->szl_s == null ? '' : 'Size S Panjang : ' . @$doszl->szl_s . ' pcs,' }}&emsp;&emsp;
                                                {{ @$doszl->szl_m == null ? '' : 'Size S Penjang : ' . @$doszl->szl_m . ' pcs,' }}&emsp;&emsp;
                                                {{ @$doszl->szl_l == null ? '' : 'Size S Panjang : ' . @$doszl->szl_l . ' pcs,' }}<br>

                                                {{ @$doszl->szl_xl == null ? '' : 'Size S Panjang : ' . @$doszl->szl_xl . ' pcs,' }}&emsp;&emsp;
                                                {{ @$doszl->szl_2xl == null ? '' : 'Size S Panjang : ' . @$doszl->szl_2xl . ' pcs,' }}&emsp;&emsp;
                                                {{ @$doszl->szl_3xl == null ? '' : 'Size S Panjang : ' . @$doszl->szl_3xl . ' pcs,' }}<br>

                                                {{ @$doszl->szl_4xl == null ? '' : 'Size S Panjang : ' . @$doszl->szl_4xl . ' pcs,' }}


                                                {{-- Size 4XL : {{@$doszl->szl_4xl}}<br> --}}
                                            </td>
                                            <td style="text-align: center; width:15% ">
                                                <br><br>
                                                <br><br>
                                                <br><br>

                                                {{-- {{ "Rp " . number_format($bahan['price'], 0, ",", "."); }}<br> --}}
                                                {{ 'Rp ' .
                                                    number_format(
                                                        $invoice->pemesanan->tipe['price_service'] + $invoice->pemesanan->bahan['price_material'],
                                                        0,
                                                        ',',
                                                        '.',
                                                    ) }}
                                                {{-- Harga Muncul = Tipe Order+Bahan --}}

                                            </td>
                                            <td style="text-align: center; width:10%">
                                                <br><br>
                                                <br><br>
                                                <br><br>

                                                {{ $invoice->pemesanan->qty }}

                                            </td>
                                            <td style="text-align: center; width:10%">
                                                <br><br>
                                                <br><br>
                                                <br><br>

                                                PCS
                                            </td>
                                            <td style="text-align: center; width:15%">
                                                <br><br>
                                                <br><br>
                                                <br><br>

                                                <?php
                                                $ammount = $invoice->pemesanan->qty * ($invoice->pemesanan->tipe['price_service'] + $invoice->pemesanan->bahan['price_material']);
                                                $total_ammount += $ammount;
                                                ?>
                                                {{-- Ammount muncul = Price x Qty --}}
                                                {{ 'Rp ' . number_format($ammount, 0, ',', '.') }}
                                                <br>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-7">
                                <p class="lead"></p>


                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    <br>
                                    *Silahkan Cek Kembali sebelum melakukan pembayaran<br>
                                    *Pembayaran melalui Transfer silahkan konfirmasi bukti<br>
                                    &nbsp; Transfer melalui WA FastPrint<br>
                                    *Pembayaran melalui rekening Bank Mandiri a/n<br>
                                    &nbsp; Mufti Miftahul Akmal 130-00-07824108
                                </p>
                                <br>
                                {{-- <p><h6><strong class="text-capitalize">Terbilang : {{\Nasution\Terbilang::convert($total_ammount-$invoice['down_payment'])}} Rupiah</strong></h6></p> --}}
                                <p>
                                <h6><strong class="text-capitalize">Terbilang :
                                        {{ \Nasution\Terbilang::convert($invoice['down_payment']) }} Rupiah</strong></h6>
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-5">
                                <p class="lead">Amount Due {{ $invoice->created_at }}</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Total</th>
                                            <td>:</td>
                                            {{-- <td><b>Rp.&emsp;&emsp;<i>{{number_format($total_ammount, 0, ",", "."); }}</i></b></td> --}}
                                            <td><b>Rp.&emsp;<i>{{ number_format($invoice->pemesanan['total'], 0, ',', '.') }}</i></b>
                                            </td>

                                        </tr>
                                        <tr>
                                            <th style="width:60%">Down Payment</th>
                                            <td style="width:5%">:</td>
                                            <td style="width:35%; text-align-last: left"><b>Rp.&emsp;
                                                    <i>{{ number_format($invoice['down_payment'], 0, ',', '.') }}</i></b>
                                            </td>
                                        </tr>
                                        {{-- <tr>
                            <th>Discount</th>
                            <td style="width:10%">:</td>
                            <td>-</td>
                          </tr> --}}

                                        <tr>
                                            <th>Sisa Pembayaran</th>
                                            <td>:</td>
                                            <td><b>Rp.&emsp;<i>{{ number_format($total_ammount - $invoice['down_payment'], 0, ',', '.') }}</i></b>
                                            </td>
                                        </tr>


                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                            {{-- <div class="col-1">
                  </div> --}}
                        </div>

                        <div class="row">
                            <!-- accepted payments column -->

                            <!-- /.col -->
                            <div class="col-12">


                                <div class="table-responsive">
                                    <table width="100%">

                                        <tbody>
                                            <tr>
                                                <th style="text-align: center; width: 50%">DIterima Oleh,</th>
                                                <th style="text-align: center; width: 50%">Hormat Kami,</th>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center; width: 50%">
                                                    <br><br><br><strong>(_____________)</strong>
                                                </td>
                                                <td style="text-align: center; width: 50%">
                                                    <br><br><br><strong>(_____________)</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12 mt-1 mr-4 mb-2">
                                @if (in_array(auth()->user()->role, [1, 3]))
                                    <button onclick="window.print()"
                                        class="btn btn-sm btn-primary float-lg-right mt-1 mr-4 mb-2">
                                        <i class="fas fa-print"></i> Print
                                    </button>
                                @endif
                                <a href="/pembayaran/dp" class="btn btn-secondary float-lg-left">Kembali</a>

                                {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                      Payment
                    </button> --}}
                                {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                      <i class="fas fa-download"></i> Generate PDF
                    </button> --}}
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
