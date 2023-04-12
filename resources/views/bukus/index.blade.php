@extends('bukus.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>DAFTAR BUKU PERPUSTAKAAN</h2>
        </div>
        <div class="float-left my-2">
            <form action="{{ route('bukus.index') }}" method="GET" class="d-flex">
                <input type="text" class="form-control" name="judul" placeholder="Judul Buku" value="{{request('judul')}}" required>
                <button type="submit" class="btn btn-dark">Search</button>
            </form>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('bukus.create') }}"> Input Buku</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>Kode Buku</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Jenis Buku</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($bukus as $bukus)
    <tr>
        <td>{{ $book->kode_buku }}</td>
        <td>{{ $book->judul }}</td>
        <td>{{ $book->pengarang }}</td>
        <td>{{ $book->jenis_buku }}</td>
        <td>{{ $book->harga }}</td>
        <td>{{ $book->qty }}</td>
        <td>
            <form action="{{ route('bukus.destroy',$book->kode_buku) }}" method="POST">
                <a class="btn btn-info" href="{{ route('bukus.show',$book->kode_buku) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('bukus.edit',$book->kode_buku) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<div class="mx-auto pb-18 w-4/5">
    {{$bukus->links()}}
</div>
@endsection
