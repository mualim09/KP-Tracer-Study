@extends('layoutadmin.layout')
@section('title', 'Detail Lowongan')
@section('content')
@section('active5')
      nav-item active
@endsection

<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 100%;
  max-width: 800px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 100%;
  max-width: 900px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 550px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}

/* img {
  width: 400px;
  height: 600px;
  object-fit: contain;
} */


</style>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail Lowongan</h6>
            </div>
            <div class="card-body">
                <div class="col px-5 mb-3">
                    <div class="card border-0 bg-grey hover">
                    <form action="{{ url('/send-message') }}" method="post">
                        {{ csrf_field() }}
                        <table class="table table">
                            <td style="width: 50%;">
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Nama Perusahaan</label>
                                    <input type="text" class="form-control" style="width: 50%;" id="nama_perusahaan" name= "nama_perusahaan" value="{{$post->nama_perusahaan}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Jenis Pekerjaan</label>
                                    <input type="text" class="form-control" style="width: 50%;" id="jenis_pekerjaan" name= "jenis_pekerjaan" value="{{$post->jenis_pekerjaan}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Keterangan</label>
                                    <input type="text" class="form-control" style="width: 50%;" id="keterangan" name= "keterangan" value="{{$post->keterangan}}" placeholder="">
                                </div>
                                <div class="form-group" >                                 
                                  <a href="{{$post->lampiran}}" id="myFile" rel="noopener noreferrer" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  ><i
                                    class="fas fa-download fa-sm text-white-50"></i> Download Document</a>                                
                                </div>
                                <div class="form-group mt-4 my-2">
                                    <a href="/admin/lowongan" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>

                                    <a href="" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-telegram"></i>
                                        </span>
                                        <span class="text">Send Telegram</span>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">                                       
                                        <img id="myImg" src="{{$post->thumbnail}}" alt="{{$post->thumbnail_name}}" style="width:300%; max-width:500px">

                                </div>
                                    
                            </td>
                        </table>
                        </form>
                    </div>
                    
                </div>
            </div>
          </div>
@endsection



<!-- Modal Show Image -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  
  <div id="caption"></div>
</div>







@section('custom_javascript')
<script>




// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#btn1').on("click",function(e){
   $('#myImg').toggle('slow');
  });
});
</script>

<!-- Image Show & Hide -->
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script type="text/javascript">
$('#myImg').each(function(){

  if ($(this).attr("src") == "") 
       $(this).hide();
  else

      $(this).show();
});
</script>
<style>
.hide {display:none !important;}
.show {display:block !important;}
</style>


<!-- FIle SHow & Hide -->
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script type="text/javascript">
$('#myFile').each(function(){

  if ($(this).attr("href") == "") 
       $(this).hide();
  else

      $(this).show();
});
</script>
<style>
.hide {display:none !important;}
.show {display:block !important;}
</style>

@endsection