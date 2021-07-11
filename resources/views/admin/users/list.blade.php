@extends('admin.layouts.app')

@section('title')
    {{ __('Users') }}
@endsection



@section('page-title')
    {{ __('Users') }}
@endsection


@section('content')
    <div class="row">

        <div class="col-md-12">


            <div class="card">


                <div class="card-header">
                    <h4 class="card-title">{{ __('Users') }}</h4>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>




                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table">
                            <thead class="text-info">
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Permission') }}</th>
                                <th>{{ __('Birth date') }}</th>
                                <th>{{ __('Created at') }}</th>
                                <th>{{ __('Updated at') }}</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ strlen($row->name) > 50 ? substr($row->name,0,50).'...' : $row->name }}</td>
                                    <td>{{ strlen($row->email) > 30 ? substr($row->email,0,30).'...' : $row->email }}</td>
                                    <td>{{ $row->permission }}</td>
                                    <td>{{ $row->birth_date }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->updated_at }}</td>
                                    <td class="text-right">
                                        <a @if (Route::has('admin.users.edit')) href="{{ route('admin.users.edit', $row->id) }}" @endif class="btn btn-warning">{{ __('Edit') }}</a>
                                    </td>
                                    <td>
                                        <form @if (Route::has('admin.users.destroy')) action="{{ route('admin.users.destroy', $row->id) }}" @endif method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                        <nav aria-label="Page navigation example">
                            <div class="table-responsive mb-2">
                                {{ $users->onEachSide(0.1)->links() }}
                            </div>
                        </nav>
                        <p>
                            {{ __('Showing') }} {{$users->count()}} {{ __('from') }} {{ $users->total() }} {{ __('entries.') }}
                        </p>


                    </div>
                </div>


            </div>

        </div>

    </div>
@endsection
