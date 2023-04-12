@extends('bukus.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Buku
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('bukus.update', $Book->kode_buku) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kode_buku">Kode Buku</label>
                        <input type="text" name="kode_buku" class="formcontrol" id="kode_buku" value="{{ $Book->kode_buku }}"
                            ariadescribedby="kode_buku">
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" class="formcontrol" id="judul" value="{{ $Book->judul }}"
                            ariadescribedby="judul">
                    </div>
                    <div class="form-group">
                        <label for="pengarang">Pengarang</label>
                        <input type="text" name="pengarang" class="formcontrol" id="pengarang" value="{{ $Book->pengarang }}"
                            ariadescribedby="pengarang">
                    </div>
                    <div class="form-group">
                        <label for="jenis_buku">Jenis Buku</label>
                        <input type="text" name="jenis_buku" class="formcontrol" id="jenis_buku"
                            value="{{ $Book->jenis_buku }}" ariadescribedby="jenis_buku">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" class="formcontrol" id="harga"
                            value="{{ $Book->harga }}" ariadescribedby="harga">
                    </div>
                    <div class="form-group">
                        <label for="qty">Jumlah</label>
                        <input type="number" name="qty" class="formcontrol" id="qty"
                            value="{{ $Book->qty }}" aria-describedby="qty">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
