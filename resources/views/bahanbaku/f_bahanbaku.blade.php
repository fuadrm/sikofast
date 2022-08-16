@extends('layouts.v_main')

{{-- @section('container')
    <h1>Pemesanan</h1>
@endsection --}}

{{-- general --}}
@section('container')

  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><b>Pemenuhan Bahan</b></h3>

          
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            {{ implode($errors->all()) }}
        </div>
        @endif
          <form action="{{route('bahanbaku.insert')}}"id="main-form" method="POST" enctype="multipart/form-data">
            @csrf
            
          <div class="row">

            <div class="col-md-7">
              <div class="form-group">

                    <div class="card-body">
                      <div class="form-group">
                        <label>No PO/Customer</label>
                        <select name="order_no_po" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" value="{{old('order_no_po')}}">
                          @foreach ($order as $order)
                              <option value="{{$order->id}}" {{$no_po == $order->no_po  ? 'selected':''}}>{{ $order->no_po}}</option>
                          @endforeach
                        </select>
                        <div class="text-danger">
                          @error('order_no_po')
                              {{ $message }}
                          @enderror
                        </div>
                      </div><br>

                      <div class="form-group">
                        <label>No Nota</label>
                        <select name="invoice_no_inv" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" value="{{old('invoice_no_inv')}}">
                          @foreach ($invoice as $invoice)
                              <option value="{{$invoice->id}}" {{$no_inv == $invoice->no_inv  ? 'selected':''}}>{{ $invoice->no_inv}}</option>
                          @endforeach
                        </select>
                        <div class="text-danger">
                          @error('invoice_no_inv')
                              {{ $message }}
                          @enderror
                        </div>
                      </div><br>
                      {{-- <div class="form-group">
                        <div class="text-center">
                          <label for="">Kertas</label>
                        </div>
                        <label for="">Bahan Baku Kertas</label>
                        <input name="bb_name1" class="form-control"  value="{{old('bb_name1')}}" id="">
                        <div class="text-danger">
                          @error('bb_name1')
                              {{ $message }}
                          @enderror
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Jumlah (rim,roll,m)</label>
                        <input name="jmlh1" class="form-control"  value="{{old('jmlh1')}}" id="">
                        <div class="text-danger">
                          @error('jmlh1')
                              {{ $message }}
                          @enderror
                        </div>
                      </div><br> --}}
                      <div class="form-group">
                        <div class="text-center">
                        <label for="">Kain</label>
                        </div>
                        <label for="">Bahan Baku Kain</label>
                        <input name="bb_name1" class="form-control"  value="{{old('bb_name1')}}" id="">
                        {{-- <div class="text-danger">
                          @error('bb_name2')
                              {{ $message }}
                          @enderror
                        </div> --}}
                      </div>
                      <div class="form-group">
                        <label for="">Jumlah (roll,m)</label>
                        <input name="jmlh1" class="form-control"  value="{{old('jmlh1')}}" id="">
                        {{-- <div class="text-danger">
                          @error('jmlh2')
                              {{ $message }}
                          @enderror
                        </div> --}}
                      </div><br><br>
                      <div class="form-group text-center">
                        <label for="">Total Pembelanjaan</label>
                        <input name="total_price" class="form-control" value="{{old('total_price')}}" id="">
                        <div class="text-danger">
                          @error('total_price')
                              {{ $message }}
                          @enderror
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Pembelanjaan</label>
      
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                          </div>
                          <input type="date" name="tgl_belanja" class="form-control" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{old('tgl_belanja')}}">
                          <div class="text-danger">
                            @error('tgl_belanja')
                                {{ $message }}
                            @enderror
                          </div>
                        </div>
                        <!-- /.input group -->
                      </div>
                      <div class="form-group">
                        
                          <label for="">Upload Nota</label>
                          <input type="file" name="nota" class="form-control" id="" value="{{old('nota')}}">
                          <div class="text-danger">
                            @error('nota')
                                {{ $message }}
                            @enderror
                          </div>
                        
                      </div>
                    </div>
                  
                  <!-- /.card-body -->
              </div>
              <!-- /.form-group -->
            </div>

          </div>
          
          <!-- /.row -->
          
          </form>
        </div>

        <div class="card-footer" >
          <button type="submit" form="main-form" class="btn btn-primary float-right" >Simpan</button>
          <a href="/bahanbaku/pemenuhan" class="btn btn-sm btn-secondary float-lg-left">Kembali</a>
        </div>
        
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div><!-- /.container-fluid -->
</section>


@endsection
