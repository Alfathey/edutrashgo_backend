<!-- resources/views/berita/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Berita</title>
</head>
<body>
    <h1>Berita</h1>

    @if (isset($error))
        <p>{{ $error }}</p>
    @else
        @foreach ($berita as $item)
            <div>
                <h2>{{ $item['title'] }}</h2>
                <p>{{ $item['content'] }}</p>
            </div>
        @endforeach
    @endif
</body>
</html>
