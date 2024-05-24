@extends('layouts.admin')


@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container d-flex justify-content-between align-items-center">
            <h1>Types</h1>

            <a class="btn btn-primary" href="{{ route('admin.types.create') }}">Add</a>
        </div>

    </header>


    <div class="container py-5">

        @include('partials.session-message')

        <div class="table-responsive">
            <table class="table table-light border border-2 table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($types as $type)
                        <tr class="">
                            <td scope="row">{{ $type->id }}</td>

                            <td>{{ $type->name }}</td>
                            <td>{{ $type->slug }}</td>
                            <td>

                                <a class="btn btn-dark" href="{{ route('admin.types.show', $type) }}"><i
                                        class="fa-solid fa-eye"></i></a>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $type->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $type->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $type->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId-{{ $type->id }}">
                                                    Attention! Are you sure you want to delete
                                                    "{{ $type->name }}" ?
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                Attention! You're deleting this record, operation is irreversible!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    <i class="fa-solid fa-xmark"></i>

                                                </button>
                                                <form action="{{ route('admin.types.destroy', $type) }}" method="post">
                                                    @csrf

                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>

                        </tr>

                    @empty
                    @endforelse

                </tbody>


            </table>
        </div>


    </div>
@endsection
