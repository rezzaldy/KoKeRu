@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home'])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-9 col-md-10">
        <h2 class="text-center">{{ __('Monitoring Kebersihan dan Kerapihan Ruangan') }}</h2>
        <h3 class="text-center">
          <script>
            var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
            document.write(hari[new Date().getDay()])
          </script>, 
          <script>
            document.write(new Date().getDate())
          </script> 
          <script>
            var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            document.write(months[new Date().getMonth()])
          </script> 
          <script>
            document.write(new Date().getFullYear())
          </script>
        </h3>
      </div>
  </div>
  <div class="row justify-content-center">
  @foreach($cs as $cs)
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="card card-stats task">
      <?php $status = $cs->status ?>
      @if($status == "sudah")
        <div class="card-header card-header-success card-header-icon">
      @else
        <div class="card-header card-header-danger card-header-icon">
      @endif
          <div class="card-icon">
            <h3><b>{{$cs->ruangan}}</b></h3>
          </div>
          <p class="card-category">{{$cs->nama}}</p>
          @if($status == "sudah")
            <h3 class="card-title card-title-success">SUDAH</h3>
          @else
            <h3 class="card-title card-title-danger">BELUM</h3>
          @endif
        </div>
        <div class="card-footer">
          <div class="stats">
          </div>
        </div>
      </div>
    </div>
  @endforeach
  </div>
</div>
@endsection
