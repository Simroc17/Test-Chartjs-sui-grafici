@extends('layouts.app')
@section('content')


<body>
    <div class="container">
        <form method="POST" action="{{route('form.insert')}}" >
        {{ csrf_field() }}
            <div class="mb-3">
                <label  for="name" class="form-label">Nome Città</label>
                <input name="name" type="text" class="form-control" style="max-width: 50%;">
            </div>
            <div class="mb-3">
                <label for="popolation" class="form-label" >Popolazione</label>
                <input name="popolation" type="number" class="form-control" style="max-width: 50%;">
            </div>
            <div class="mb-3">
                <label for="popolation" class="form-label" >Densità</label>
                <input name="denstita" type="number" class="form-control" style="max-width: 50%;">
            </div>
            <div class="mb-3">
                <label for="popolation" class="form-label" >Superficie</label>
                <input name="superfice" type="number" class="form-control" style="max-width: 50%;">
            </div>
            <!-- <div class="mb-3">
                <label for="" class="form-label" >Data di nascita</label>
                <input name="dataDiNascita" type="text" class="form-control" style="max-width: 50%;">
            </div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>


@endsection