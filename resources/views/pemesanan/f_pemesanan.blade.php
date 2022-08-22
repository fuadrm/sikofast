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
                    <form action="/pemesanan/insert" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">


                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Customer</label>
                                            <input name="customer" class="form-control" value="{{ old('customer') }}"
                                                id="" placeholder="Nama">
                                            <div class="text-danger">
                                                @error('customer')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Telpon</label>
                                            <input name="phone" class="form-control" value="{{ old('phone') }}"
                                                id="" placeholder="081xxxxxx">

                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="address" class="form-control" rows="3" placeholder="Enter ..." value="" required>{{ old('address') }}</textarea>
                                            <div class="text-danger">
                                                @error('address')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Masuk Produksi</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="date" name="started_at" class="form-control"
                                                    data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                    value="{{ old('started_at') }}">
                                                <div class="text-danger">
                                                    @error('started_at')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Jatuh Tempo Produksi</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="date" name="finished_at" class="form-control"
                                                    data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                                    data-mask value="{{ old('finished_at') }}">
                                                <div class="text-danger">
                                                    @error('finished_at')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jumlah Order</label>
                                            <input type="number" name="qty" class="form-control" id="qty"
                                                placeholder="pcs" value="{{ old('qty') }}">
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
                                            <input type="number" name="sz_s" class="form-control" id="sz_s"
                                                onchange="JumlahSizeChange(this)" value="{{ old('sz_s') }}"
                                                id="" placeholder="5 ">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size M</label>
                                            <input type="number" name="sz_m" class="form-control" id="sz_m"
                                                onchange="JumlahSizeChange(this)" value="{{ old('sz_m') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size L</label>
                                            <input type="number" name="sz_l" class="form-control" id="sz_l"
                                                onchange="JumlahSizeChange(this)" value="{{ old('sz_l') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size XL</label>
                                            <input type="number" name="sz_xl" class="form-control" id="sz_xl"
                                                onchange="JumlahSizeChange(this)" value="{{ old('sz_xl') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 2XL</label>
                                            <input type="number" name="sz_2xl" class="form-control" id="sz_2xl"
                                                onchange="JumlahSizeChange(this)" value="{{ old('sz_2xl') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 3XL</label>
                                            <input type="number" name="sz_3xl" class="form-control" id="sz_3xl"
                                                onchange="JumlahSizeChange(this)" value="{{ old('sz_3xl') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 4XL</label>
                                            <input type="number" name="sz_4xl" class="form-control" id="sz_4xl"
                                                onchange="JumlahSizeChange(this)" value="{{ old('sz_4xl') }}"
                                                id="" placeholder="5">

                                        </div>

                                        <div class="form-group" style="font-size: 20px;  text-align:center">
                                            <label>Lengan Pendek</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size S</label>
                                            <input type="number" name="szs_s" class="form-control" id="szs_s"
                                                onchange="JumlahSizeChange(this)" value="{{ old('szs_s') }}"
                                                id="" placeholder="5 ">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size M</label>
                                            <input type="number" name="szs_m" class="form-control" id="szs_m"
                                                onchange="JumlahSizeChange(this)" value="{{ old('szs_m') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size L</label>
                                            <input type="number" name="szs_l" class="form-control" id="szs_l"
                                                onchange="JumlahSizeChange(this)" value="{{ old('szs_l') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size XL</label>
                                            <input type="number" name="szs_xl" class="form-control" id="szs_xl"
                                                onchange="JumlahSizeChange(this)" value="{{ old('szs_xl') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 2XL</label>
                                            <input type="number" name="szs_2xl" class="form-control" id="szs_2xl"
                                                onchange="JumlahSizeChange(this)" value="{{ old('szs_2xl') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 3XL</label>
                                            <input type="number" name="szs_3xl" class="form-control" id="szs_3xl"
                                                onchange="JumlahSizeChange(this)" value="{{ old('szs_3xl') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 4XL</label>
                                            <input type="number" name="szs_4xl" class="form-control" id="szs_4xl"
                                                onchange="JumlahSizeChange(this)" value="{{ old('szs_4xl') }}"
                                                id="" placeholder="5">

                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan Tambahan</label>
                                            <textarea name="add_detail" class="form-control" rows="3" placeholder="Enter ..." value="">{{ old('add_detail') }}</textarea>
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
                                            {{-- <input name="no_po" class="form-control" value="{{old('no_po')}}"id=""> --}}
                                            <input name="no_po" class="form-control" value="{{ $no_po }}"
                                                readonly>
                                            <div class="text-danger">
                                                @error('no_po')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tim</label>
                                            <input name="team" class="form-control" value="{{ old('team') }}"
                                                id="" placeholder="FastPrint FC">

                                        </div>
                                        <div class="form-group">
                                            <label>Bahan</label>
                                            <select name="mat_material_name" id="mat_material_name"
                                                class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                value="{{ old('mat_material_name') }}">
                                                @foreach ($bahan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->material_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Order</label>
                                            <select name="serv_service_name" id="serv_service_name"
                                                class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                value="{{ old('serv_service_name') }}">
                                                @foreach ($tipe as $item)
                                                    <option value="{{ $item->id }}">{{ $item->service_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            {{-- <div class="text-danger">
                        @error('service_name')
                            {{ $message }}
                        @enderror
                      </div> --}}
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Desain</label>
                                                <input type="file" name="design" class="form-control" id=""
                                                    value="{{ old('design') }}">
                                                <div class="text-danger">
                                                    @error('design')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="">Total Pembayaran</label>
                                            <input class="form-control" name="total" id="total"
                                                value="{{ old('total') }}" readonly>
                                        </div>
                                        <div class="form-group" style="font-size: 20px;  text-align:center">
                                            <label>Lengan Panjang</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size S</label>
                                            <input type="number" name="szl_s" class="form-control" id="szl_s"
                                                onchange="JumlahSizeChange(this)" value="{{ old('szl_s') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size M</label>
                                            <input type="number" name="szl_m" class="form-control" id="szl_m"
                                                onchange="JumlahSizeChange(this)" value="{{ old('szl_m') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size L</label>
                                            <input type="number" name="szl_l" class="form-control" id="szl_l"
                                                onchange="JumlahSizeChange(this)" value="{{ old('szl_l') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size XL</label>
                                            <input type="number" name="szl_xl" class="form-control" id="szl_xl"
                                                onchange="JumlahSizeChange(this)" value="{{ old('szl_xl') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 2XL</label>
                                            <input type="number" name="szl_2xl" class="form-control" id="szl_2xl"
                                                onchange="JumlahSizeChange(this)" value="{{ old('szl_2xl') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 3XL</label>
                                            <input type="number" name="szl_3xl" class="form-control" id="szl_3xl"
                                                onchange="JumlahSizeChange(this)" value="{{ old('szl_3xl') }}"
                                                id="" placeholder="5">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Size 4xl</label>
                                            <input type="number" name="szl_4xl" class="form-control" id="szl_4xl"
                                                onchange="JumlahSizeChange(this)" value="{{ old('szs_4xl') }}"
                                                id="" placeholder="5">

                                        </div>


                                        <div class="form-group">
                                            <label>Keterangan Order</label>
                                            <textarea name="caption" class="form-control" rows="3" placeholder="Enter ..." value="">{{ old('caption') }}</textarea>

                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                            <a href="/pemesanan" class="btn btn-secondary float-lg-left">Kembali</a>
                            {{-- <button type="submit" class="btn btn-primary float-left">Kembali</button> --}}
                        </div>
                    </form>
                </div>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>

    {{-- hitung total bayar --}}
    <script>
        const list_bahan = new Map();
        @foreach ($bahan as $item)
            list_bahan.set({{ $item->id }}, {{ $item->price_material }})
        @endforeach
        const list_tipe = new Map();
        @foreach ($tipe as $item)
            list_tipe.set({{ $item->id }}, {{ $item->price_service }})
        @endforeach

        document.getElementById('qty').addEventListener("keyup", refresh_total);
        document.getElementById('mat_material_name').addEventListener("change", refresh_total);
        document.getElementById('serv_service_name').addEventListener("change", refresh_total);



        function refresh_total() {
            const total = $('#total');
            const material = $('#mat_material_name');
            const service = $('#serv_service_name');
            const qty = $('#qty');

            total.val(Number(qty.val()) * (list_bahan.get(Number(material.val())) + list_tipe.get(Number(service.val()))));
        }
    </script>

    {{-- validasi detail sizeqty --}}
    @push('script')
        <script>
            // Global variable
            let qty = 0
            let sizeQty = 0

            $('#qty').on('change', ev => {
                qty = $('#qty').val()
            })

            function JumlahSizeChange(val) {
                let sz_s = $('#sz_s').val()
                let sz_m = $('#sz_m').val()
                let sz_l = $('#sz_l').val()
                let sz_xl = $('#sz_xl').val()
                let sz_2xl = $('#sz_2xl').val()
                let sz_3xl = $('#sz_3xl').val()
                let sz_4xl = $('#sz_4xl').val()

                let szs_s = $('#szs_s').val()
                let szs_m = $('#szs_m').val()
                let szs_l = $('#szs_l').val()
                let szs_xl = $('#szs_xl').val()
                let szs_2xl = $('#szs_2xl').val()
                let szs_3xl = $('#szs_3xl').val()
                let szs_4xl = $('#szs_4xl').val()

                let szl_s = $('#szl_s').val()
                let szl_m = $('#szl_m').val()
                let szl_l = $('#szl_l').val()
                let szl_xl = $('#szl_xl').val()
                let szl_2xl = $('#szl_2xl').val()
                let szl_3xl = $('#szl_3xl').val()
                let szl_4xl = $('#szl_4xl').val()

                sizeQty = Number(sz_s) +
                    Number(sz_m) +
                    Number(sz_l) +
                    Number(sz_xl) +
                    Number(sz_2xl) +
                    Number(sz_3xl) +
                    Number(sz_4xl) +
                    Number(szs_s) +
                    Number(szs_m) +
                    Number(szs_l) +
                    Number(szs_xl) +
                    Number(szs_2xl) +
                    Number(szs_3xl) +
                    Number(szs_4xl) +
                    Number(szl_s) +
                    Number(szl_m) +
                    Number(szl_l) +
                    Number(szl_xl) +
                    Number(szl_2xl) +
                    Number(szl_3xl) +
                    Number(szl_4xl);

                if (sizeQty > qty) {
                    alert(`Jumlah Detail Size Melebihi Total Order yang diinput : ${qty}`)
                    $(`#${val.id}`).val("0")
                }

            }
        </script>
    @endpush

@endsection
