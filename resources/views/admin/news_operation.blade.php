<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 Drag And Drop File Upload Using Dropzone - Online Web Tutor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>

<body>

<div class="container section">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="text-center">Laravel 8 Drag And Drop File Upload Using Dropzone</h3>

            <form method="post" action="{{route('image/upload/store' , $id)}}" enctype="multipart/form-data"
                  class="dropzone" id="dropzone">
                @csrf
            </form>         </div>
    </div>
</div>
<script type="text/javascript">
    console.log(myDropzone.getAcceptedFiles() + "Accepted Files");

    Dropzone.options.dropzone =
        {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            removedfile: function(file)
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'POST',
                    url: '{{ url("image/delete") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },

            success: function(file, response)
            {
                console.log(response);
            },
            error: function(file, response)
            {
                return false;
            }
        };



    ///////////////////////////////////////

</script>
</body>
</html>