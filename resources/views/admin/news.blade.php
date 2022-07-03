@extends('layouts.master')
@section('style')
    <!-- Stylesheet -->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
          crossorigin="anonymous">
    <link href="{{url('/assets/css/tagsinput.css')}}" rel="stylesheet" type="text/css">

@endsection

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
                                    <select name="journalist_name" onchange="anotherJournalist()" id="journalist_name" required >
                                        <option >Select journalist name</option>

                                        <option value="1">journalist_name one</option>
                                        <option value="2">journalist_name two</option>
                                        <option value="3">journalist_name three</option>
                                        <option value="4">journalist_name main</option>
                                        <option value="0">another</option>

                                    </select>
                                </div>
                                    <br>
                                <input type="hidden" name="" class="form-control" value="" placeholder="insert name of journalist" id="hiddenJournalist">
                            </div>

                            <script>
                                function anotherJournalist() {


                                        var hiddenJournalist = document.getElementById('hiddenJournalist');
                                        var journalistSelectInput = document.getElementById('journalist_name');

                                        if (journalistSelectInput.value == 0 && hiddenJournalist.attributes[0].value == 'hidden') {
                                            hiddenJournalist.setAttribute("name", "journalist_name");
                                            hiddenJournalist.setAttribute("type", "text");

                                            journalistSelectInput.setAttribute("name", "");
                                        } else {
                                            hiddenJournalist.setAttribute("name", "");
                                            hiddenJournalist.setAttribute("type", "hidden");

                                            journalistSelectInput.setAttribute("name", "journalist_name");

                                        }
                                }

                            </script>
                            <!----------------end--journalist------------------------->

                            <!--------------------------------------------->
                        </div>
                        <!-- end card -->


<br><br>


                        <!-------------ckeditor------------------->
                        <!-- ======= textarea text editor style start ======= -->
                        <div class="card-style mb-30">

{{--                            <textarea class="form-control" name="editor" id="task_textarea" rows="5"></textarea>--}}
                            <textarea class="form-control" id="summary_ckeditor" name="summary_ckeditor"></textarea>
                            <!-- end textarea -->
                        </div>

                        <!-- ======= textarea text editor style start ======= -->
                        <!--------------------end editor------------->
                        <br><br>
                        <!-- ======= select style start ======= -->
                        <div class="card-style mb-30">
                            <div class="select-style-1">
                                <div class="select-position">
                                    <select name="category_id">
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
                                <input type="file"  name="main_image" />
                            </div>

                            <!-------------------------------------------->

                            <div class="input-style-1">
                                <label>the title under image</label>
                                <input type="text" name="image_title" id="name" placeholder="Enter your image_title" class="form-control" required autocomplete="off">

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
                        <div class="input-style-1" id="form2">
                            @csrf
                            <label>Tags</label>
                            <small class="text-secondary">Insert each tag like this pattern :    abcd,efgh, ........................................... <br></small>

                            <input type="text" data-role="tagsinput" id="allTags" name="tags"   value="">
                            <input type="hidden" name="tagsIds" id="hidden_tags">
                          <br>
                            <br>
                            <span onclick="insertTags(document.getElementById('allTags').value)" class="btn btn-outline-success btn-sm d-inline" >insert tags</span>
                           <br>
                            <br>

                        </div>
                            <span  name="successTags" class="text-success" id="successTags"> </span>

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

                        ///////////////for ck editor part to update the ckeditor input before invoked in server because it gives error//////////////
                        CKEDITOR.instances.summary_ckeditor.updateElement();
                        ///////////////for ck editor part//////////////

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
    CKEDITOR.replace( 'summary_ckeditor' );

</script>
<!--------------------------------------------end ckeditor part------------------------->
    <!-- JavaScript -->
{{--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"--}}
{{--            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"--}}
{{--            crossorigin="anonymous">--}}
{{--    </script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"--}}
{{--            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"--}}
{{--            crossorigin="anonymous">--}}
{{--    </script>--}}
    <script>

        function insertTags(object) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let allTags = document.getElementById('allTags').value;
            var formData2 = {
                '_token' : token,
                'tags' : object
            };
            $.ajax({
                type: 'POST',
                url: '{{url('insert_tags')}}',
                data: formData2,
                // contentType: false,
                // processData: false,
                // cache: false,
                success: function(result){
                    if(result.status == "success"){
                        // fetch the useid

                        $("#hidden_tags").val(result.tagsArrIds); // inseting userid into hidden input field
                        $("#successTags").text('You have inserted tags successfully'); // inseting userid into hidden input field


                    }else{
                        console.log("error");
                    }
                }
            });


        }
        
        
        

    </script>
{{--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"--}}
{{--            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"--}}
{{--            crossorigin="anonymous">--}}
{{--    </script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous">
    </script>
    <script src="{{url('/assets/js/tagsinput.js')}}"></script>

@endsection


