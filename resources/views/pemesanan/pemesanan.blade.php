@extends('layouts.v_main')

{{-- @section('container')
    <h1>Pemesanan</h1>
@endsection --}}

@section('container')

    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">

                    @if (in_array(auth()->user()->role, [1, 2]))
                        <a href="/pemesanan/add" class="btn btn-primary float-lg-right">+</a>
                    @endif

                    {{-- <a href="/pemesanan/generateExcel" class="btn btn-success float-lg-right mr-1">ExportExcel</a> --}}

                    @if (in_array(auth()->user()->role, [1]))
                        <a href="/pemesanan/generateExcel"
                            class="btn btn-success float-lg-right mr-1 export-excel">ExportExcel</a>
                        <div class="col-md-3 float-lg-right">
                            <div class="form-group">


                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="float-lg-right mr-1">Periode Laporan</label>
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>

                                    <input type="date" name="started_at_inv" class="form-control start-date"
                                        data-inputmask-inputformat="dd/mm/yyyy" data-mask value="">

                                </div>

                                <!-- /.input group -->
                            </div>
                        </div>
                    @endif

                    @if (session('pesan'))
                        <div class="alert alert-success alert-dismissible col-lg-6">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            {{ session('pesan') }}.
                        </div>
                    @endif

                    <form class="form-inline ml-3" action="/pemesanan">
                        <div class="input-group input-group-sm float-lg-left">
                            <input class="form-control form-control-navbar" type="search" placeholder="cari..nama/no-po"
                                name="search" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <br>
                @if ($order->count())
                    <div class="col-12 table-responsive">
                        <table class="table table-striped" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Pre-Order</th>
                                    <th>Customer</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Deadline</th>
                                    <th>Total Pembayaran</th>
                                    <th>Bahan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($order as $key => $data)
                                    <tr>
                                        <td>{{ $order->firstItem() + $key }}</td>
                                        <td>{{ $data->no_po }}</td>
                                        <td>{{ $data->customer }}</td>
                                        <td>{{ $data->started_at }}</td>
                                        <td>{{ $data->finished_at }}</td>
                                        {{-- <td>{{$data->qty}}</td> --}}
                                        <td>{{ 'Rp ' . number_format($data['total'], 0, ',', '.') }}</td>
                                        <td>{{ $data->bahan->material_name }}</td>
                                        <td>
                                            @if (in_array(auth()->user()->role, [1, 2, 3]))
                                                <a href="/pemesanan/detail/{{ $data->id }}"
                                                    class="btn btn-sm btn-success"><i class="nav-icon fas fa-eye"></i></a>
                                            @endif
                                            @if (in_array(auth()->user()->role, [1, 2]))
                                                <a href="/pemesanan/edit/{{ $data->id }}"
                                                    class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></a>
                                            @endif
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            @if (in_array(auth()->user()->role, [1, 2]))
                                                <form action="/pemesanan/destroy/{{ $data->id }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger border-0"
                                                        onclick="return confirm('Are You Sure?')">
                                                        <i class="nav-icon fas fa-trash"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div>
                            Showing
                            {{ $order->firstItem() }}
                            to
                            {{ $order->lastItem() }}
                            of
                            {{ $order->total() }}
                            entries
                        </div>

                        <div class="d-flex justify-content-end">

                            {{ $order->links() }}


                        </div>
                    </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div><!-- /.container-fluid -->

    </section>
@else
    <p class="text-center">Pencarian tidak ditemukan</p>
    @endif

    @push('script')
        <script>
            // Global variable
            $('.start-date').change(function() {
                $('.export-excel').attr('href', '/pemesanan/generateExcel?tanggal=' + $(this).val())

            });
        </script>
    @endpush

@endsection
