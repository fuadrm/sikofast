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

                    @if (session('pesan'))
                        <div class="alert alert-success alert-dismissible col-lg-6"">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            {{ session('pesan') }}.
                        </div>
                    @endif

                    {{-- @if (in_array(auth()->user()->role, [1, 3]))
                <a href="/bahanbaku/add" class="btn btn-primary float-lg-right">+</a>
                @endif --}}

                    {{-- <a href="/bahanbaku/generateExcel" class="btn btn-success float-lg-right mr-1">ExportExcel</a> --}}
                    @if (in_array(auth()->user()->role, [1]))
                        <a href="/bahanbaku/generateExcel"
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

                </div>

                {{-- search --}}



                <br>
                <div class="col-12 table-responsive">
                    <table class="table table-striped" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No_PO</th>
                                <th>Kain</th>
                                {{-- <th>Kain</th> --}}
                                <th>Tanggal Belanja</th>
                                <th>Harga</th>
                                <th>Status Bahan</th>
                                <th>Ubah Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            {{-- @foreach ($bahanbaku as $bb) --}}

                            @foreach ($bahanbaku as $key => $bb)
                                {{-- @dd($bb->no_po) --}}
                                <tr>
                                    {{-- <td>{{ $loop->iteration }}</td> --}}
                                    <td>{{ $bahanbaku->firstItem() + $key }}</td>
                                    <td>{{ $bb->pemesanan->no_po }}</td>
                                    <td>{{ $bb->bb_name1 }}</td>
                                    {{-- <td>{{ $bb->bb_name2 }}</td> --}}
                                    <td>{{ $bb->tgl_belanja }}</td>
                                    <td>{{ 'Rp ' . number_format($bb['total_price'], 0, ',', '.') }}</td>
                                    <td><label
                                            class="label {{ $bb->status_bb == 1 ? 'label-success' : 'label-warning' }}">{{ $bb->status_bb == 1 ? 'Terpenuhi' : 'Belum Terpenuhi' }}</label>
                                    </td>
                                    <td>
                                        @if ($bb->status_bb == 1)
                                            @if (in_array(auth()->user()->role, [1, 3]))
                                                <a href="/bahanbaku/status/{{ $bb->id }}"
                                                    class="btn btn-sm btn-warning">Belum Terpenuhi</a>
                                            @endif
                                        @else
                                            @if (in_array(auth()->user()->role, [1, 3]))
                                                <a href="/bahanbaku/status/{{ $bb->id }}"
                                                    class="btn btn-sm btn-primary">Terpenuhi</a>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/bahanbaku/detail/{{ $bb->id }}" class="btn btn-sm btn-success"><i
                                                class="nav-icon fas fa-eye"></i></a>
                                        @if (in_array(auth()->user()->role, [1, 3]))
                                            <a href="/bahanbaku/edit/{{ $bb->id }}" class="btn btn-sm btn-warning"><i
                                                    class="nav-icon fas fa-edit"></i></a>
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
                                        @if (in_array(auth()->user()->role, [1]))
                                            <form action="/bahanbaku/destroy/{{ $bb->id }}" method="POST"
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
                        {{ $bahanbaku->firstItem() }}
                        to
                        {{ $bahanbaku->lastItem() }}
                        of
                        {{ $bahanbaku->total() }}
                        entries
                    </div>

                    <div class="d-flex justify-content-end">

                        {{ $bahanbaku->links() }}


                    </div>

                    <!-- /.card-body -->
                </div>
                <div class="card-footer">
                    <a href="/bahanbaku/pemenuhan" class="btn btn-secondary float-lg-left">Kembali</a>
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
    </section>

    @push('script')
        <script>
            // Global variable
            $('.start-date').change(function() {
                $('.export-excel').attr('href', '/bahanbaku/generateExcel?tanggal=' + $(this).val())

            });
        </script>
    @endpush
@endsection
