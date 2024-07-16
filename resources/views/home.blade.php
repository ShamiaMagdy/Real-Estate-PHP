<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @foreach ($properties as $property)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset($property->images[0]->imagepath) }}" class="card-img-top" alt="image for property {{ $property->id }}">
            <div class="card-body">
                <h5 class="card-title">{{ $property->type }}</h5>
                <p class="card-text">{{ $property->description }}</p>
                <p class="card-text">{{ $property->location }}</p>
                <p class="card-text">{{ $property->price }}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    @endforeach

</body>

</html>
