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

                    @if (in_array(auth()->user()->role, [1, 3]))
                        <a href="/pembayaran/add" class="btn btn-primary float-lg-right">+</a><br><br>
                    @endif

                    @if (in_array(auth()->user()->role, [1]))
                        <a href="/pembayaran/generateExcel"
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

                    <form class="form-inline ml-3" action="/pembayaran">
                        <div class="input-group input-group-sm float-lg-left">
                            <input class="form-control form-control-navbar" type="search" placeholder="cari..nomor nota.."
                                name="search" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div><br>

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Data Pembayaran
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/pembayaran/dp">
                        <i class="bi bi-layout-text-sidebar-reverse"></i>&ensp; Down Payment</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/pembayaran/lunas">
                        <i class="bi bi-layout-text-sidebar-reverse"></i>&ensp; Lunas</a>
                </div>

                <br>
                @if ($invoice->count())
                    <div class="col-12 table-responsive">
                        <table class="table table-striped" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Nota</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th>Status Pembayaran</th>
                                    @if (in_array(auth()->user()->role, [1, 3]))
                                        <th>Ubah Status</th>
                                    @endif
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($invoice as $key => $data)
                                    <tr>
                                        <td>{{ $invoice->firstItem() + $key }}</td>
                                        <td>{{ $data->no_inv }}</td>
                                        <td>{{ $data->started_at_inv }}</td>
                                        <td>{{ 'Rp ' . number_format($data->pemesanan['total'], 0, ',', '.') }}</td>
                                        <td><label
                                                class="label {{ $data->status_inv == 1 ? 'label-success' : 'label-danger' }}">{{ $data->status_inv == 1 ? 'Lunas' : 'Down Payment' }}</label>
                                        </td>
                                        {{-- <td>{{$data->pemesanan->customer}}</td>
                        <td>{{$data->pemesanan->tipe->service_name}}</td>
                        <td>{{$data->pemesanan->qty}}</td> --}}
                                        @if (in_array(auth()->user()->role, [1, 3]))
                                            <td>
                                                @if ($data->status_inv == 1)
                                                    @if (in_array(auth()->user()->role, [1, 3]))
                                                        <a href="/pembayaran/status/{{ $data->id }}"
                                                            class="btn btn-sm btn-danger">Belum Lunas</a>
                                                    @endif
                                                @else
                                                    @if (in_array(auth()->user()->role, [1, 3]))
                                                        <a href="/pembayaran/status/{{ $data->id }}"
                                                            class="btn btn-sm btn-success">Lunas</a>
                                                    @endif
                                                @endif
                                            </td>
                                        @endif
                                        <td>
                                            <a href="/pembayaran/detail/{{ $data->id }}"
                                                class="btn btn-sm btn-success"><i class="nav-icon fas fa-eye"></i></a>
                                            @if (in_array(auth()->user()->role, [1, 3]))
                                                <a href="/pembayaran/edit/{{ $data->id }}"
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
                                            @if (in_array(auth()->user()->role, [1, 3]))
                                                <form action="/pembayaran/destroy/{{ $data->id }}" method="POST"
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
                            {{ $invoice->firstItem() }}
                            to
                            {{ $invoice->lastItem() }}
                            of
                            {{ $invoice->total() }}
                            entries
                        </div>

                        <div class="d-flex justify-content-end">

                            {{ $invoice->links() }}


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
                $('.export-excel').attr('href', '/pembayaran/generateExcel?tanggal=' + $(this).val())

            });
        </script>
    @endpush


@endsection
