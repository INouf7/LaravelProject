<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Project') }}
        </h2>
    </x-slot>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <form action="{{ route('project.create') }}" method="post" style="padding:10px; width:100%;box-shadow:2px 2px 2px 2px rgba(0,0,0,0.5); ">
                @csrf
                <h1><b>Project Details</b></h1>
                <h2>Create a new Project</h2>
                <br>
                <div class="col-span-6 sm:col-span-4">
                    <label for="name">Project Title</label>
                    <input id="name" name="title" type="text" class="mt-1 block w-full w-60" autofocus required/>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="name">Project Client</label>
                    <input id="name" name="client" type="text" class="mt-1 block w-full w-60" autofocus required/>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="type">Project Type</label>
                    <select name="type" id="type" type="text" class="mt-1 block w-full w-60">
                        <option value="Consultancy Project">Consultancy Project</option>
                        <option value="Research Grant">Research Grant</option>
                    </select>
                </div>
                <br>
                <x-jet-button type="submit">
                    {{ __('Create') }}
                </x-jet-button>
            </form>
        </div>
    </div>
</x-app-layout>
