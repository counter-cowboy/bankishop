<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index images</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color: lightgrey">

<section class="container ">
    <div class="form-group mb-5">
        <form action="{{route('image.create')}}" method="get">
            <button type="submit" class="btn btn-primary">
                Add images
            </button>
        </form>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @foreach($images as $img)
                <div class="w-50 mb-5">
                    <a href="{{asset('storage/'. $img->image)}}">
                        <img src="{{asset('storage/'. $img->image ) }}" class="w-50"
                            alt="preview_image">
                    </a>
                    <br>
                    <div class="text-black">File_ID: {{$img->id}} <br>
                        Filename: {{substr($img->image, 7) }}<br>
                        Uploaded at: {{$img->created_at}}<br>
                        <form action="{{ route('zip', $img->id) }}" method="get">
                            <button type="submit" class="btn btn-primary">
                                ZIP-download
                            </button>
                        </form>
                        <hr>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{--<script src="{{asset('assets/js/app.js')}}"></script>--}}
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
