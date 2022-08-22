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
                    <h3 class="card-title"><b>Pre-Order</b></h3>


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
                    <form action="/pemesanan/update/{{ $order->id }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">


                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Customer</label>
                                            <input name="customer" class="form-control"
                                                value="{{ old('customer', $order->customer) }}" id=""
                                                placeholder="Nama">
                                            <div class="text-danger">
                                                @error('customer')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telpon</label>
                                            <input name="phone" class="form-control"
                                                value="{{ old('phone', $order->phone) }}" id=""
                                                placeholder="081xxxxxx">

                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Masuk</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="" name="started_at" class="form-control"
                                                    data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                                    data-mask value="{{ old('started_at', $order->started_at) }}" disabled>
                                                {{-- <div class="text-danger">
                          @error('created_at')
                              {{ $message }}
                          @enderror
                        </div> --}}
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Jatuh Tempo</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="" name="finished_at" class="form-control"
                                                    data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                                    data-mask value="{{ old('finished_at', $order->finished_at) }}"
                                                    disabled>
                                                {{-- <div class="text-danger">
                          @error('finished_at')
                              {{ $message }}
                          @enderror
                        </div> --}}
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jumlah Order</label>
                                            <input name="qty" class="form-control" id="" placeholder="pcs"
                                                value="{{ old('qty', $order->qty) }}" readonly>
                                            <div class="text-danger">
                                                @error('qty')
                                                    {{ $message }}
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="form-group" style="font-size: 20px;  text-align:center">
                                            <label>Tanpa Lengan</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size S</label>
                                            <input name="sz_s" class="form-control"
                                                value="{{ old('szs_s', @$dosz->sz_s) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size M</label>
                                            <input name="sz_m" class="form-control"
                                                value="{{ old('sz_m', @$dosz->sz_m) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size L</label>
                                            <input name="sz_l" class="form-control"
                                                value="{{ old('sz_l', @$dosz->sz_l) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size XL</label>
                                            <input name="sz_xl" class="form-control"
                                                value="{{ old('sz_xl', @$dosz->sz_xl) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 2XL</label>
                                            <input name="sz_2xl" class="form-control"
                                                value="{{ old('sz_2xl', @$dosz->sz_2xl) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 3XL</label>
                                            <input name="sz_3xl" class="form-control"
                                                value="{{ old('sz_3xl', @$dosz->sz_3xl) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 4XL</label>
                                            <input name="sz_4xl" class="form-control"
                                                value="{{ old('sz_4xl', @$dosz->sz_4xl) }}" id="" readonly>

                                        </div>


                                        <div class="form-group" style="font-size: 20px;  text-align:center">
                                            <label>Lengan Pendek</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size S</label>
                                            <input name="szs_s" class="form-control"
                                                value="{{ old('szs_s', @$doszs->szs_s) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size M</label>
                                            <input name="szs_m" class="form-control"
                                                value="{{ old('szs_m', @$doszs->szs_m) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size L</label>
                                            <input name="szs_l" class="form-control"
                                                value="{{ old('szs_l', @$doszs->szs_l) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size XL</label>
                                            <input name="szs_xl" class="form-control"
                                                value="{{ old('szs_xl', @$doszs->szs_xl) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 2XL</label>
                                            <input name="szs_2xl" class="form-control"
                                                value="{{ old('szs_2xl', @$doszs->szs_2xl) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 3XL</label>
                                            <input name="szs_3xl" class="form-control"
                                                value="{{ old('szs_3xl', @$doszs->szs_3xl) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 4XL</label>
                                            <input name="szs_4xl" class="form-control"
                                                value="{{ old('szs_4xl', @$doszs->szs_4xl) }}" id="" readonly>

                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan Tambahan</label>
                                            <textarea name="add_detail" class="form-control" rows="3" placeholder="Enter ..." value="">{{ old('add_detail', @$order->add_detail) }}</textarea>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor Order</label>
                                            <input name="no_po" class="form-control"
                                                value="{{ old('no_po', $order->no_po) }}"id="" disabled>
                                            {{-- <div class="text-danger">
                        @error('no_po')
                            {{ $message }}
                        @enderror
                      </div> --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tim</label>
                                            <input name="team" class="form-control"
                                                value="{{ old('phone', $order->team) }}" id=""
                                                placeholder="081xxxxxx">

                                        </div>
                                        <div class="form-group">
                                            <label>Bahan</label>
                                            <input name="material_name" class="form-control"
                                                value="{{ $order->bahan->material_name }}" readonly>
                                            {{-- <select name="material_name" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" value="{{old('material_name', $order->material_name)}}">
                        @foreach ($bahan as $item)
                          @if (old('material_name', $order->material_name) == $item->id)
                            <option value="{{$item->id}}" selected>{{ $item->material_name}}</option>
                          @else
                            <option value="{{$item->id}}">{{ $item->material_name}}</option>
                          @endif
                        @endforeach
                      </select> --}}
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Order</label>
                                            <input name="service_name" class="form-control"
                                                value="{{ $order->tipe->service_name }}" readonly>
                                            {{-- <select name="service_name" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" value="{{old('service_name', $order->service_name)}}">
                        @foreach ($tipe as $item)
                          @if (old('service_name', $order->service_name) == $item->id)
                            <option value="{{$item->id}}" selected>{{ $item->service_name}}</option>
                          @else
                            <option value="{{$item->id}}">{{ $item->service_name}}</option>
                          @endif
                        @endforeach
                      </select>
                      <div class="text-danger">
                        @error('service_name')
                            {{ $message }}
                        @enderror
                      </div> --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="">Total Pembayaran</label>
                                            <input class="form-control" name="total" id="total"
                                                value="{{ 'Rp ' . number_format($order['total'], 0, ',', '.') }}"
                                                readonly>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Desain</label>
                                                <div>
                                                    <img src="{{ url('design/' . $order->design) }}" width="400px">
                                                    <br>
                                                </div>
                                                {{-- <input type="file" name="design" class="form-control" value="{{old('design', $order->design)}}">
                        <div class="text-danger">
                          @error('design')
                              {{ $message }}
                          @enderror
                        </div> --}}
                                            </div>

                                        </div>
                                        <div class="form-group" style="font-size: 20px;  text-align:center">
                                            <label>Lengan Panjang</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size S</label>
                                            <input name="szl_s" class="form-control"
                                                value="{{ old('szl_s', @$doszl->szl_s) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size M</label>
                                            <input name="szl_m" class="form-control"
                                                value="{{ old('szl_m', @$doszl->szl_m) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size L</label>
                                            <input name="szl_l" class="form-control"
                                                value="{{ old('szl_l', @$doszl->szl_l) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size XL</label>
                                            <input name="szl_xl" class="form-control"
                                                value="{{ old('szl_xl', @$doszl->szl_xl) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 2XL</label>
                                            <input name="szl_2xl" class="form-control"
                                                value="{{ old('szl_2xl', @$doszl->szl_2xl) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 3XL</label>
                                            <input name="szl_3xl" class="form-control"
                                                value="{{ old('szl_3xl', @$doszl->szl_3xl) }}" id="" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 4xl</label>
                                            <input name="szl_4xl" class="form-control"
                                                value="{{ old('szs_4xl', @$doszl->szl_4xl) }}" id="" readonly>

                                        </div>
                                        {{-- @dd($order) --}}
                                        <div class="form-group">
                                            <label>Keterangan Order</label>
                                            <textarea name="caption" class="form-control" rows="3" placeholder="Enter ..." value="">{{ old('caption', $order->caption) }}</textarea>

                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                            <a href="/pemesanan" class="btn btn-secondary float-lg-left">Kembali</a>
                        </div>
                    </form>
                </div>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>


@endsection
