<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create upload</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>

<body style="background-color: #bacbe6">
    <section class="container ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('image.store')}}" enctype="multipart/form-data">
                        @csrf

                        {{-- image--}}
                        <div class="form-group w-100 mt-5 mb-5">
                            <div class="form-label"><label>Add image up to 5 files</label></div>
                            <div class="input-group">
                                <div class="custom-file mb-5">
                                    <input type="file" required multiple id="multiFile" class="custom-file-input"
                                        name="images[]">
                                    {{--  Submit button--}}
                                    <input type="submit" class="btn btn-primary" value="Upload">
                                </div>
                            </div>
                        </div>
                    </form>
                    {{--End form--}}
                </div>
            </div>
        </div>
    </section>
    {{--End section--}}
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script>
    document.querySelector('#multiFile').addEventListener('change',
        function() {
            if (this.files.length > 5) {
                this.value = '';
                alert('Limit up to 5 files');
            }
        })
    </script>
</body>

</html>