@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1 class="breadcrumb-item">{{ $event->title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Tableau de Bord</a></div>
                <div class="breadcrumb-item text-muted"><a href="#">Modifier un évènement</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-4">
                <div class="col-12 justify-content-center">
                    <div class="card">
                        <div class="clearfix mb-3"></div>
                        <div class="card-body">
                            <form action="{{ route('event.update', $event->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group col-6">
                                    <label for="title">Titre</label>
                                    <input id="title" value="{{ $event->title }}" type="text" class="form-control" name="title" autofocus>
                                </div>

                                <div class="col-6 form-group">
                                    <label for="email">Description</label>
                                    <textarea class="form-control" name="description" cols="30" rows="100">{{ $event->description }}</textarea>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                
                                <div class="ml-3 form-group">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                    Modifier
                                    </button>
                                </div>
                                <input hidden type="text" name="user_id" value="{{ auth()->id() }}">
                                <input hidden type="text" name="link" value="{{ $link }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
