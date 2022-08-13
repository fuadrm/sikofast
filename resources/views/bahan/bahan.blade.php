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

                @if (session('pesan'))
                    <div class="alert alert-success alert-dismissible col-lg-6"">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        {{session('pesan')}}.
                    </div>
                @endif
                
                
                @if(in_array(auth()->user()->role,[1]))
                <a href="/bahan/add" class="btn btn-primary float-lg-right">+</a>
                @endif
               
                <form class="form-inline ml-3" action="/bahan" >
                    <div class="input-group input-group-sm float-lg-left">
                      <input class="form-control form-control-navbar" type="search" 
                        placeholder="cari...bahan" name="search" value="{{request('search')}}">
                      <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                </form>
          </div>
         <br>
    @if ($bahan->count())
        <div class="col-12 table-responsive">
        <table class="table table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th>No</th>
                    {{-- <th>Kode Bahan</th> --}}
                    <th>Bahan</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($bahan as $key =>$data)
                    <tr>
                        <td>{{ $bahan->firstItem() + $key }}</td>
                        
                        <td>{{ $data->material_name }}</td>
                        <td>{{ "Rp " . number_format($data['price_material'], 0, ",", "."); }}</td>
                        <td>
                            {{-- <a href="" class="btn btn-sm btn-success">Detail</a> --}}
                            @if(in_array(auth()->user()->role,[1]))
                            <a href="/bahan/edit/{{$data->id}}" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></a>
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
                            @if(in_array(auth()->user()->role,[1]))
                            <form action="/bahan/destroy/{{$data->id}}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                    <button class="btn btn-sm btn-danger border-0" onclick="return confirm('Are You Sure?')">
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
            {{ $bahan->firstItem()}}
            to
            {{ $bahan->lastItem()}}
            of
            {{ $bahan->total()}}
            entries
        </div>

        <div class="d-flex justify-content-end">
        
            {{ $bahan->links() }}
        

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

@endsection