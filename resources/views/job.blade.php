<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

<h2 class="font-bold text-lg">{{$job["title"]}}</h2>

    <p>
        this is the salary <strong>{{$job['salary']}}</strong> of a {{$job['title']}}
    </p>
</x-layout>
