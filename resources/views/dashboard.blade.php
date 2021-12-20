<x-app-layout>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Client</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        @if($user->belongsToProject($project))
                        <tr>
                            <td>{!! $project->title !!}</td>
                            <td>{!! $project->type !!}</td>
                            <td>{!! $project->client !!}</td>
                            <td>
                                <a type="button" href="{{route('project-view', ['id'=>$project->id])}}" class="btn btn-primary"><i class="far fa-eye"></i></a>

                                @if($user->isAdmin($project->team_id))
                                <a type="button" href="{{route('project-edit', ['id'=>$project->id])}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a type="button" onclick="return confirm('Are you sure?')" href="{{route('project-delete', ['id'=>$project->id])}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
