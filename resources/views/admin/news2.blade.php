@extends('layouts.master')

@section('content')

    <!-- ========== tab components start ========== -->
    <section class="tab-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>Form Elements</h2>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper mb-30">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#0">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#0">Forms</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Form Elements
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <!-- ========== form-elements-wrapper start ========== -->
{{--            <form enctype="multipart/form-data" name="demoform" method="post" action="/upload" class="form-elements-wrapper">--}}
            <form action="{{ route('form.data') }}" name="demoform" id="demoform" method="POST" class="dropzone" enctype="multipart/form-data">

            @csrf

                <div class="row">
                    <div class="col-lg-12">
                        <!-- input style start -->
                        <div class="card-style mb-30">

                            <div class="input-style-1">
                                <label>Main Title</label>
                                <input type="hidden" class="userid" name="userid" id="userid" value="">
                                <input type="text" name="main_title" id="main_title" placeholder="Enter your main_title" class="form-control" required autocomplete="off">

{{--                                <input type="text" name="alldata['main_title']" placeholder="Main Title" />--}}
                            </div>
                            <!---------------------journalist--------------------->

                            <div class="select-style-1">
                                <div class="select-position">
                                    <select name="journalist_name" id="journalist_name" required >
                                        <option >Select journalist name</option>

                                        <option value="1">journalist_name one</option>
                                        <option value="2">journalist_name two</option>
                                        <option value="3">journalist_name three</option>
                                        <option selected value="4">journalist_name main</option>

                                    </select>
                                </div>
                            </div>

                            <!----------------end--journalist------------------------->

                            <!--------------------------------------------->
                        </div>
                        <!-- end card -->


<br><br>


                        <!-------------ckeditor------------------->
                        <!-- ======= textarea text editor style start ======= -->
                        <div class="card-style mb-30">

{{--                            <textarea class="form-control" name="editor" id="task_textarea" rows="5"></textarea>--}}
                            <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
                            <!-- end textarea -->
                        </div>

                        <!-- ======= textarea text editor style start ======= -->
                        <!--------------------end editor------------->
                        <br><br>
                        <!-- ======= select style start ======= -->
                        <div class="card-style mb-30">
                            <div class="select-style-1">
                                <div class="select-position">
                                    <select name="category_id" id="category_id">
                                        <option value="1">Select category</option>
                                        <option value="2">Category one</option>
                                        <option value="3">Category two</option>
                                        <option value="4">Category three</option>
                                    </select>
                                </div>
                            </div>
                            <!-- end select -->
                        </div>
                        <!-- end card -->
                        <!-- ======= select style end ======= -->


                        <br><br>
                        <div class="card-style mb-30">

                            <div class="input-style-1">
                                <label>Choose Main Image</label>
                                <input type="file"  name="main_image" id="main_image" />
                            </div>

                            <!-------------------------------------------->

                            <div class="input-style-1">
                                <label>the title under image</label>
                                <input type="text" name="image_title" id="image_title" placeholder="Enter your image_title" class="form-control" required autocomplete="off">

                                {{--                                <input type="text" name="alldata['image_title']" placeholder="write title" />--}}
                            </div>
                        </div>


                        <!-------------this card---------------->
                        <!-- ======= input style end ======= -->



                    </div>

                    <br><br><br><br>

                    <div class="form-group">
                        <div class="card-style mb-30">

                        <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea">
                            <span>Upload file</span>
                        </div>
                        <div class="dropzone-previews"></div>
                        </div>
                    </div>

                    <br><br><br><br>

                    <!-- end col -->
                    <div class="col-lg-12">
                        <!------------------------------------------>
                        <!-- ======= textarea style start ======= -->
                        <div class="card-style mb-30">
                        <div class="input-style-1">
                            <label>Message</label>
                            <textarea  placeholder="Message" name="tags" id="tags" rows="5"></textarea>
                        </div>
                        </div>
                        <!-- end textarea -->

                        <!-- ======= textarea style start ======= -->



                        <!------------------------------------------>

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">

                        <!------------------------------------>


                </div><!-- end row-->


                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">create</button>
                </div>

                <!--------//////////////test////////////////////////----->





            </form>
            <!-- ========== form-elements-wrapper end ========== -->
        </div>
        <!-- end container -->

    </section>
    <!-- ========== tab components end ========== -->

@endsection

@section('scripts')

{{--    <script>--}}
{{--        //####################ck editor#####################--}}

{{--        let lang = '<?php echo app()->getLocale(); ?>';--}}
{{--        ClassicEditor--}}
{{--    .create( document.querySelector( '#task_textarea' ), {--}}
{{--    language: lang--}}
{{--    } )--}}
{{--    .then( editor => {--}}
{{--    window.editor = editor;--}}


{{--    } )--}}
{{--    .catch( err => {--}}
{{--    console.error( err.stack );--}}
{{--    } );--}}


{{--        //####################end ck editor#####################--}}
{{--    </script>--}}

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Dropzone.autoDiscover = false;
        // Dropzone.options.demoform = false;
        let token = $('meta[name="csrf-token"]').attr('content');
        $(function() {
            var myDropzone = new Dropzone("div#dropzoneDragArea", {
                paramName: "file[]",
                url: "{{ url('/storeimgae') }}",
                previewsContainer: 'div.dropzone-previews',
                addRemoveLinks: true,
                autoProcessQueue: false,
                uploadMultiple: false,
                parallelUploads: 3,
                maxFiles: 3,
                params: {
                    _token: token
                },
                // The setting up of the dropzone
                init: function() {
                    var myDropzone = this;
                    //form submission code goes here
                    $("form[name='demoform']").submit(function(event) {
                        //Make sure that the form isn't actully being sent.
                        event.preventDefault();

                        URL = $("#demoform").attr('action');
                        // formData = $('#demoform').serialize();
                      var formData = new FormData($('#demoform')[0]);
                        $.ajax({
                            type: 'POST',
                            enctype: 'multipart/form-data',
                            url: URL,
                            data: formData,
                            // //test
                            processData: false,
                            contentType: false,
                            cache: false,
                            // //test

                            success: function(result){
                                if(result.status == "success"){
                                    // fetch the useid
                                    var userid = result.user_id;
                                    $("#userid").val(userid); // inseting userid into hidden input field
                                    //process the queue
                                    myDropzone.processQueue();
                                }else{
                                    console.log("error");
                                }
                            }
                        });
                    });

                    //Gets triggered when we submit the image.
                    this.on('sending', function(file, xhr, formData){
                        //fetch the user id from hidden input field and send that userid with our image
                        let userid = document.getElementById('userid').value;
                        formData.append('userid', userid);
                    });

                    this.on("success", function (file, response) {
                        //reset the form
                        $('#demoform')[0].reset();
                        //reset dropzone
                        $('.dropzone-previews').empty();
                    });

                    this.on("queuecomplete", function () {

                    });

                    // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
                    // of the sending event because uploadMultiple is set to true.
                    this.on("sendingmultiple", function() {
                        // Gets triggered when the form is actually being sent.
                        // Hide the success button or the complete form.
                    });

                    this.on("successmultiple", function(files, response) {
                        // Gets triggered when the files have successfully been sent.
                        // Redirect user or notify of success.
                    });

                    this.on("errormultiple", function(files, response) {
                        // Gets triggered when there was an error sending the files.
                        // Maybe show form again, and notify user of error
                    });
                }
            });
        });
    </script>

<!--------------------------------------------ckeditor part------------------------->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
<!--------------------------------------------end ckeditor part------------------------->

@endsection


