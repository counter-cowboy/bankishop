<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color: #bacbe6">
<section class="container ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form  method="post" id="multiFile" multiple
                     action="{{route('image.store')}}" enctype="multipart/form-data">
                    @csrf

                    {{-- image--}}
                    <div class="form-group w-50">
                        <label>Add image 1</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="images[]">

                                <label class="custom-file-label">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>


                    {{--  Submit button--}}
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary col-1" value="Upload">
                    </div>
                </form>
                {{--End form--}}
            </div>
        </div>
    </div>
</section>

<script src="{{asset('assets/js/app.js')}}"></script>
<script>
    document.querySelector('#multiFile').addEventListener('change',
    function () {
        if (this.files.length>5){
            this.value='';
            alert('Limit up to 5 files');
        }
    })
</script>
</body>
</html>
