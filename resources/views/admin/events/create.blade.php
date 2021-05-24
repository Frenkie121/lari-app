@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1 class="breadcrumb-item">Ajouter un évènement</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Tableau de Bord</a></div>
                <div class="breadcrumb-item text-muted"><a href="#">Ajouter un évènement</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-4">
                <div class="col-12 justify-content-center">
                    <div class="card">
                        <div class="clearfix mb-3"></div>
                        <div class="card-body">
                            <form action="{{ route('event.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="form-group col-6">
                                    <label for="title">Titre</label>
                                    <input id="title" type="text" class="form-control" name="title" autofocus>
                                </div>

                                <div class="col-6 form-group">
                                    <label for="email">Description</label>
                                    <textarea class="form-control" name="description" id="" cols="30" rows="100"></textarea>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                
                                <div class="ml-3 form-group">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                    Enregistrer
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
