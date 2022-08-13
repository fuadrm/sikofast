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

          
        </div>
        <!-- /.card-header -->

        <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('bahanbaku.update',$bahanbaku->id)}}" method="POST" enctype="multipart/form-data">
          @method('put')
          @csrf
          <div class="col-md-6">
            <div class="formgroup">

                  <div class="card-body">
                    
                    {{-- <div class="form-group">
                      <label>No PO/Customer</label>
                      <select name="no_po" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" value="{{old('no_po')}}">
                        @foreach ($order as $order)
                            <option value="{{$order->id}}" {{$no_po == $order->no_po  ? 'selected':''}}>{{ $order->no_po}}</option>
                        @endforeach
                      </select>
                      <div class="text-danger">
                        @error('no_po')
                            {{ $message }}
                        @enderror
                      </div>
                    </div><br> --}}
                    <div class="form-group">
                      <div class="text-center">
                      <label for="">Kain</label>
                      </div>
                      <label for="">Bahan Baku Kain</label>
                      <input name="bb_name2" class="form-control"  value="{{old('bb_name1',$bahanbaku->bb_name1)}}" id="">
                      {{-- <div class="text-danger">
                        @error('bb_name1')
                            {{ $message }}
                        @enderror
                      </div> --}}
                    </div>
                    <div class="form-group">
                      <label for="">Jumlah (roll,m)</label>
                      <input name="jmlh1" class="form-control"  value="{{old('jmlh2',$bahanbaku->jmlh1)}}" id="">
                      {{-- <div class="text-danger">
                        @error('jmlh2')
                            {{ $message }}
                        @enderror
                      </div> --}}
                    </div><br><br>
                    <div class="form-group text-center">
                      <label for="">Total Pembelanjaan</label>
                      <input name="total_price" class="form-control" value="{{old('total_price',$bahanbaku->total_price)}}" id="">
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
                        <input type="date" name="tgl_belanja" class="form-control" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{old('tgl_belanja',$bahanbaku->tgl_belanja)}}">
                        <div class="text-danger">
                          @error('tgl_belanja')
                              {{ $message }}
                          @enderror
                        </div>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <div class="form-group">
                      <div class="form-group">
                        <label for="">Nota Pembelanjaan</label>
                        <div>
                            <img src="{{ url('notabb/'.$bahanbaku->nota)}}" width="400px">
                            <br>
                        </div>
                      
                      </div>
                    
                    </div>
                  </div>
                
                <!-- /.card-body -->
            </div>
            <!-- /.form-group -->
          </div>

          <div class="card-footer" >
            <button type="submit" class="btn btn-primary float-right" >Update</button>
            <a href="/bahanbaku" class="btn btn-secondary float-lg-left">Kembali</a>
          </div>
        </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div><!-- /.container-fluid -->
</section>

        
        
      


@endsection
