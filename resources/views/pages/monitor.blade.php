@extends('layouts.app', ['activePage' => 'monitor', 'titlePage' => __('Monitor')])

@section('content')
<div class="content">
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
        <div class="text-center">
          <a class="btn btn-sm btn-primary" href="resetStatus" onclick="return confirm('Apakah anda yakin mereset semua status kebersihan ruang ?');">Reset</a>
        </div>
      </div>
    </div>
    <div class="row justify-content-center mt-3">
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
            <div class="container mt-1"><hr></div>
            @if($status == "sudah")
            <?php 
              $bukti = array($cs->bukti1, $cs->bukti2, $cs->bukti3, $cs->bukti4, $cs->bukti5);
              $id = $cs->id_ruang;
            ?>
              @if($bukti[0] != NULL)
                <?php 
                  $f = finfo_open();
                  $data = finfo_buffer($f, $bukti[0], FILEINFO_MIME_TYPE);
                  $split = explode( '/', $data );
                  $type = $split[1];
                ?>
                @if($type != 'mp4')
                  <div class="card-footer monitor img-ava" style="background-image: url('data:image/jpeg;base64, {{base64_encode($bukti[0])}}');">
                    <div class="stats">
                    <button type="button" class="btn btn-primary btn-sm btn-modal" data-toggle="modal" data-target="#myModal{{$id}}">View</button>
                @else
                  <div class="card-footer monitor img-ava">
                    <div class="stats">
                      <video width="300" height="125" muted>
                        <source src="data:video/mp4;base64, {{base64_encode($bukti[0])}}" type="video/mp4">
                      </video>
                      <button type="button" class="btn btn-primary btn-sm btn-modal" data-toggle="modal" data-target="#myModal{{$id}}" style="z-index: 1000; position: absolute; transform: translate(117px,40px);">View</button>
                @endif
              @endif
              </div>
            </div>
            <div class="modal fade" id="myModal{{$id}}" role="dialog">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                      <div class="row justify-content-center">
                        @for($i = 0; $i < count($bukti); $i++)
                          @if($bukti[$i] != NULL)
                            <?php 
                              $f = finfo_open();
                              $data = finfo_buffer($f, $bukti[$i], FILEINFO_MIME_TYPE);
                              $split = explode( '/', $data );
                              $type = $split[1];
                            ?>
                            @if($type != 'mp4')
                              <div class="col-lg-6 col-md-6 col-sm-6 text-center mt-3">
                                <img class="bukti" src="data:image/jpeg;base64, {{base64_encode($bukti[$i])}}" style="object-fit: cover; width: 300px; height: 200px;">
                              </div>
                            @else
                              <div class="col-lg-6 col-md-6 col-sm-6 text-center mt-3">
                                <video width="300" height="200" controls>
                                  <source src="data:video/mp4;base64, {{base64_encode($bukti[$i])}}" type="video/mp4">
                                  Sorry, your browser doesn't support the video element.
                                </video>
                              </div>
                            @endif
                          @endif
                        @endfor
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-modal btn-sm" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            @else
            <div class="card-footer monitor">
              <div class="stats">
                <h4>Belum Dibersihkan</h4>
              </div>
            </div>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection