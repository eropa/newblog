@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Редактировать новость</div>

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{ url('/update/new/'. $data->id) }}">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Заголовок</label>
                                <div class="col-sm-10">
                                    <input class="form-control form-control-sm" type="text" name="title"
                                           value="{{ $data->title }}"
                                    >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Дата публикации</label>
                                <div class="col-sm-10">
                                    <input class="form-control form-control-sm"  type="date" id="start"
                                           name="datepublic"
                                           value="{{ $data->datepublic }}"
                                           >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label"> Короткое описание</label>
                                <div class="col-sm-10">
                                    <textarea class="description" name="smalltext">
                                        {!! $data->smalltext !!}
                                        </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label"> Полное описание</label>
                                <div class="col-sm-10">
                                    <textarea class="description" name="bigtext">
                                        {!! $data->bigtext !!}
                                        </textarea>
                                </div>
                            </div>
                            <input type="hidden" value="{{$data->id}}" name="id">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Обновить</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('myjs')

    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    <script>
        tinymce.init({
            selector:'textarea.description',
            width: 900,
            height: 300
        });
    </script>

@endsection
