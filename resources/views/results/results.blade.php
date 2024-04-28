<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @foreach ($project as $item)   
    <title>{{$item->name}}</title>
    @endforeach
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">        
    @foreach ($project as $item)
    <style>
        .image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            @if ($item->background_image)
                background-image: url({{ asset('storage/' . $item->background_image) }});
                @else
                background-image: url({{$item->background_color}});
            @endif

        }

        @media only screen and (max-width: 768px) {
            .image {
                background-size: cover;
                background-position: center;
                background-image: url({{ asset('storage/' . $item->background_phone) }});
            }
        }

        #styleC {
            width: 150%;
            text-align: right;
            margin-top: 25%;
        }

        @media only screen and (max-width: 768px) {
            #styleC {
                /* Center alignment */
                position: fixed;
                left: 50%;
                transform: translateX(-50%);
                bottom: 10%; /* Adjusted margin-bottom for bottom alignment */
                text-align: center;
            }
        }


        @media only screen and (max-width: 768px) {
            .image-bg {
                text-align:end;
                width: 50%;
            }
        }


        @media only screen and (max-width: 883px) {
            .image-bg {
                text-align:end;
                width: 50%;
            }
        }
</style>
@endforeach

</head>
<body>
    <div class="image" style="">
        <div class="container">
            <div class="row">
                @foreach ($project as $item)
                <div id="styleC">
                    <a href="{{url('/programme')}}" class="">
                        <img src="{{ asset('storage/' . $item->button_one) }}" style="" width="30%" alt="" class="image-bg">
                    </a>
                    <br>
                    <a href="https://smdiabete.org/inscription-congres/" target="__blank" class="">
                        <img src="{{ asset('storage/' . $item->button_two) }}" style="" width="30%" alt="" class="image-bg">
                    </a>
                    <br>
                    <a href="#" class="">
                        <img src="{{ asset('storage/' . $item->button_three) }}" style="" width="30%" alt="" class="image-bg">
                    </a>
                    <br>
                    <a href="{{url('/rediffusion')}}" class="">
                        <img src="{{ asset('storage/' . $item->button_four) }}" style="" width="30%" alt="" class="image-bg">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>      
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"</script>

</body>
</html>
