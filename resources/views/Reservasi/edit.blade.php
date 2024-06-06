@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Dashboard') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('reservasi.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('reservasi.update', $reservasi->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal_reservasi') is-invalid @enderror" name="tanggal_reservasi"
                                value="{{ $reservasi->tanggal_reservasi }}" placeholder="tanggal" required>
                            @error('tanggal_reservasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah orang</label>
                            <input type="text" class="form-control @error('jumlah_orang') is-invalid @enderror" name="jumlah_orang"
                                value="{{ $reservasi->jumlah_orang }}" placeholder="jumlah orang" required>
                            @error('jumlah_orang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Pengunjung</label>
                            <select name="id_pengunjung" id="" class="form-control">
                                @foreach ($pengunjung as $item)
                                    <option value="{{$item->id}}" {{$item->id == $reservasi->id_pengunjung ? 'selected': ''}}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Destinasi</label>
                            <select name="id_destinasi" id="" class="form-control">
                                @foreach ($destinasi as $item)
                                    <option value="{{$item->id}}" {{$item->id == $reservasi->id_destinasi ? 'selected': ''}}>{{ $item->nama_destinasi }}</option>
                                @endforeach
                            </select>
                        </div>


                        <button type="submit" class="btn btn-sm btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-sm btn-warning">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection