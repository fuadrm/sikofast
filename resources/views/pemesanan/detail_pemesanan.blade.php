@extends('layouts.v_main')

{{-- @section('container')
    <h1>Pemesanan</h1>
@endsection --}}

@section('container')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header" >
            
          </div>
         <br>
        
        <table class="table table-bordered">
            <thead width="100%">
                <tr>
                    <th colspan="2" rowspan="4" style="width:40%; height:100%">
                        <img src="{{ url('img/Profil Logo.jpg')}}" style="width:100%; padding-bottom: 30px;">
                    </th>
                    <th colspan="3" style="text-align:left; font-size: 40px; width:60%; height:30% padding-bottom: 20px;" >FORM ORDER</th>
                </tr>
                <tr>
                    <th colspan="3" style="height: 70%">
                        JL. CANGKUANG KULON NO.33 BANDUNG<br>
                        PHONE/WA 081221574560<br>
                        IG @fastprintbdg<br>
                        E-MAIL fastprintbdg1@gmail.com
                    </th>
                    
                </tr>
               
            <tbody>
               
                    <tr>
                        <td style="width:20%"><b>Customer</b></td>
                        <td style="width:20%">{{$order->customer}}</td>
                        <td style="width:20%; text-align:center;" rowspan="4"><b>Keterangan Order</b>
                            <br>
                            <br>
                            <br>
                                <p style="font-size: 30px"><b>{{$order->tipe->service_name}}</b></p>
                            
                        </td>
                        <td style="width:14%; text-align:center;"><b>NO PO</b></td>
                        <td style="width:26%">{{$order->no_po}}</td>
                        
                    </tr>
                    <tr>
                        <td style="width:20%"><b>Telpon</b></td>
                        <td style="width:20%">{{$order->phone}}</td>
                        <td style="width:14%; text-align:center;"><b>Tim</b></td>
                        <td style="width:26%">
                            {{$order->team}}
                        </td>
                    </tr>
                    <tr>
                        <td style="width:20%"><b>Masuk</b></td>
                        <td style="width:20%">{{$order->started_at}}</td>
                        <td style="width:14%; text-align:center;"><b>Bahan</b></td>
                        <td style="width:26%">
                            {{$order->bahan->material_name}}
                        </td>
                    </tr>
                    <tr>
                        <td style="width:20%"><b>Deadline</b></td>
                        <td style="width:20%">{{$order->finished_at}}</td>
                        <td style="width:14%; text-align:center;"><b>Qty</b></td>
                        {{-- <td style="width:26%">{{@$doszs->szs_m}}</td> --}}
                        <td style="width:26%">{{$order->qty}}</td>
                    </tr>
                    <tr>
                        <td style="width:60%" colspan="3" rowspan="2"><b>Desain</b>
                            <br>
                            <img src="{{ url('design/'.$order->design)}}" width="600px">
                        </td>
                        <td style="width:40%" colspan="2"><b>Detail Tambahan</b>
                            <br>
                            {{$order->add_detail}}
                        </td>
                    </tr>
                    <tr>
                        <td style="width:40%" colspan="2"><b>Keterangan Print</b>
                            <br>
                            {{$order->caption}}
                        </td>
                    </tr>
            </tbody>
        </table> 

        <table class="table table-bordered">
            <thead style="width: 100%">
                {{-- <tr>
                    <th colspan="9">Keterangan Ukuran</th>
                </tr> --}}
                <tr>
                    <th style="width: 18%">Keterangan Ukuran</th>
                    <th style="width: 10%; text-align:center">Size S</th>
                    <th style="width: 10%; text-align:center">Size M</th>
                    <th style="width: 10%; text-align:center">Size L</th>
                    <th style="width: 10%; text-align:center">Size XL</th>
                    <th style="width: 10%; text-align:center">Size 2XL</th>
                    <th style="width: 10%; text-align:center">Size 3XL</th>
                    <th style="width: 10%; text-align:center">Size 4XL</th>
                    <th style="width: 12%; text-align:center">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="width: 18%">Tanpa Lengan</th>
                    <td style="width: 10%; text-align:center">{{@$dosz->sz_s == null ? '':''.@$dosz->sz_s}}</td>
                    <td style="width: 10%; text-align:center">{{@$dosz->sz_m == null ? '':''.@$dosz->sz_m}}</td>
                    <td style="width: 10%; text-align:center">{{@$dosz->sz_l == null ? '':''.@$dosz->sz_l}}</td>
                    <td style="width: 10%; text-align:center">{{@$dosz->sz_xl == null ? '':''.@$dosz->sz_xl}}</td>
                    <td style="width: 10%; text-align:center">{{@$dosz->sz_2xl == null ? '':''.@$dosz->sz_2xl}}</td>
                    <td style="width: 10%; text-align:center">{{@$dosz->sz_3xl == null ? '':''.@$dosz->sz_3xl}}</td>
                    <td style="width: 10%; text-align:center">{{@$dosz->sz_4xl == null ? '':''.@$dosz->sz_4xl}}</td>
                    <td style="width: 12%; text-align:center" rowspan="3"><br><br>{{$order->qty}}</td>
                </tr>
                <tr>
                    <th style="width: 18%">Lengan Pendek</th>
                    <td style="width: 10%; text-align:center">{{@$doszs->szs_s == null ? '':''.@$doszs->szs_s}}</td>
                    <td style="width: 10%; text-align:center">{{@$doszs->szs_m == null ? '':''.@$doszs->szs_m}}</td>
                    <td style="width: 10%; text-align:center">{{@$doszs->szs_l == null ? '':''.@$doszs->szs_l}}</td>
                    <td style="width: 10%; text-align:center">{{@$doszs->szs_xl == null ? '':''.@$doszs->szs_xl}}</td>
                    <td style="width: 10%; text-align:center">{{@$doszs->szs_2xl == null ? '':''.@$doszs->szs_2xl}}</td>
                    <td style="width: 10%; text-align:center">{{@$doszs->szs_3xl == null ? '':''.@$doszs->szs_3xl}}</td>
                    <td style="width: 10%; text-align:center">{{@$doszs->szs_4xl == null ? '':''.@$doszs->szs_4xl}}</td>
                    
                </tr>
                <tr>
                    <th style="width: 18%">Lengan Panjang</th>
                    <td style="width: 10%; text-align:center">{{@$doszl->szl_s == null ? '':''.@$doszl->szl_s}}</td>
                    <td style="width: 10%; text-align:center">{{@$doszl->szl_m == null ? '':''.@$doszl->szl_m}}</td>
                    <td style="width: 10%; text-align:center">{{@$doszl->szl_l == null ? '':''.@$doszl->szl_l}}</td>
                    <td style="width: 10%; text-align:center">{{@$doszl->szl_xl == null ? '':''.@$doszl->szl_xl}}</td>
                    <td style="width: 10%; text-align:center">{{@$doszl->szl_2xl == null ? '':''.@$doszl->szl_2xl}}</td>
                    <td style="width: 10%; text-align:center">{{@$doszl->szl_3xl == null ? '':''.@$doszl->szl_3xl}}</td>
                    <td style="width: 10%; text-align:center">{{@$doszl->szl_4xl == null ? '':''.@$doszl->szl_4xl}}</td>
                </tr>
            </tbody>
            
        </table>
        {{-- <script type="text/javascript">
            window.print();
        </script> --}}
        <div class="row no-print">
            <div class="col-12 mt-1 mr-4 mb-2">
                <button onclick="window.print()" class="btn btn-sm btn-primary float-lg-right mt-1 mr-4 mb-2">
                    <i class="fas fa-print"></i> Print
                </button>
                <a href="/pemesanan" class="btn btn-secondary float-lg-left ml-4">Kembali</a>
              {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                Payment
              </button> --}}
              {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
              </button> --}}
            </div>
          </div>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div><!-- /.container-fluid -->
    
  </section>

@endsection