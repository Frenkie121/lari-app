@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1 class="breadcrumb-item">Mes évènements</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Tableau de Bord</a></div>
                <div class="breadcrumb-item text-muted"><a href="#">Evènements</a></div>
            </div>
            <div class="section-header-button">
                <a href="{{ route('event.create') }}" class="btn btn-primary">Ajouter un évènement</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                <div class="card">
                    <div class="clearfix mb-3"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            @if($events->count())
                                <tr>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Auteur</th>
                                    <th>Créé le</th>
                                    <th>Lien</th>
                                </tr>
                            @endif
                            @forelse($events as $event)
                                <tr>
                                    <td>{{ $event->title }}
                                        <div class="table-links">
                                            <div class="bullet"></div>
                                            <a href="{{ route('event.edit', $event->id) }}">Edit</a>
                                            <div class="bullet"></div>
                                            <a href="{{ route('event.destroy', ['event' => $event->id]) }}" onclick="event.preventDefault();
                                                document.getElementById('delete-form-{{ $event->id }}').submit();" class="text-danger">Trash</a>
                                                
                                            <form action="{{ route('event.destroy', $event->id) }}" method="post" id="delete-form-{{ $event->id}}">
                                                @csrf
                                                @method('DELETE')
                                                
                                            </form>
                                        </div>
                                    </td>
                                    <td>{{ ($event->description) > 15 ? substr($event->description, 0, 15) . '...' : $event->description }}</td>
                                    <td>
                                        <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle" width="25" data-toggle="title" title=""> 
                                        <div class="d-inline-block ml-1">{{ $event->user->name}}</div>
                                    </td>
                                    <td>{{ date_format($event->created_at, 'd-m-Y') }}</td>
                                    <td>
                                        <div class="{{ !is_null($event->end_at) ? 'badge badge-primary' : '' }}"></div>
                                        @if(is_null($event->end_at))
                                            <a href="{{ route('course.classroom', $event->link) }}">Aller au cours</a>
                                        @else
                                            Terminé
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <div class="text-center">Aucun évènement pour vous</div>
                            @endforelse
                        </table>
                    </div>
                    @if($events->count() > 0)
                        <div class="float-right">
                            <nav>
                            <ul class="pagination">
                                <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                </li>
                                <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                                </li>
                            </ul>
                            </nav>
                        </div>
                    @endif
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection
