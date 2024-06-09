@extends('dashboard.layouts.main')

@section('container')

{{-- {{dd($user->name)}} --}}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Profile</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{session('success')}}
</div>
@endif

<div class="col-lg-8 ">

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', auth()->user()->name)}}" disabled>
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{old('username', auth()->user()->username)}}" disabled>
            @error('username')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <a href="/dashboard/profile/{{$user->id}}/edit" class="btn btn-primary d-block col-2">Edit Profile</a>

        

        

{{-- <script>
    const title =document.querySelector('#title');
    const slug =document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept',function(e){
        e.preventDefault();
    })

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }

</script> --}}

@endsection