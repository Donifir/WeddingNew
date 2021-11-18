@extends('layouts.dashboard')

@section('title')
Detail Product
@endsection

@section('subtitle')
Dashboard Penambaan product
@endsection

@section('button')
<div class="button m-4">
    <a class="btn btn-primary " href="/product" role="button">Back</a>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
      <div class="card ">
        <div class="card-header ">
          <h4 class="card-title text-uppercase">{{ $paket -> nama }}</h4>
          <hr>
        </div>

        <div class="card-footer ">
          <div class="legend">
            <img src="/image/{{ $paket -> gambar }} "alt="Card image cap" style="width: 100%">

        </div>
          <hr>
          <div class="stats">
            @for ($i = 0; $i < 5; ++$i)
                    <i class="fa fa-star{{ $paket->bintang <= $i ? '-o' : '' }}" aria-hidden="true" style="color:gold"></i>
                @endfor
          </div>

        </div>
      </div>

    </div>
    <div class="col-md-8">
      <div class="card card-chart">
        {{-- <div class="card-body"> --}}
            <table class="table table-striped">
                <thead>
                  <tr>
                    <td scope="col">Nama paket</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $paket -> nama }}</td>
                  </tr>
                  <tr>
                    <td scope="col">Harga</td>
                    <td scope="col">:</td>
                    <td scope="col">Rp. {{ $paket -> harga }}</td>
                  </tr>
                  <tr>
                    <td scope="col">Maksimal Pengerjaan</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $paket -> lama_pengerjaan }} hari</td>
                  </tr>
                  <tr>
                    <td scope="col">Bintang</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $paket -> bintang }}</td>
                  </tr>
                  <tr>
                    <td scope="col">Keterangan</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $paket -> keterangan }}</td>
                  </tr>
                  @if ($paket->deleted_at!==null)
                    <tr>
                        <td scope="col">Status</td>
                        <td scope="col">:</td>
                        <td scope="col">Deleted</td>
                    </tr>
                  @endif
                </thead>
              </table>
        {{-- </div> --}}
        @if (Auth::user()->role == 'Clientmanagent' && $paket->deleted_at==null)
            <div class="d-grid gap-2 col-6 mx-auto m-4">
                <a class="btn btn-primary btn-center " href="/dashboard/paket-undangan/{{$paket->id}}/edit" role="button">Edit</a>
                <form action="/dashboard/paket-undangan/{{ $paket->id }}" method="post" style="float: right">
                    @csrf
                    @method('DELETE')
                <button class="btn btn-small btn-danger btn-center ">Hapus</button>
                </form>
            </div>
        @endif
      </div>
    </div>
  </div>

@endsection




