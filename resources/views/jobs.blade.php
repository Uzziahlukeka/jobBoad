<x-layout>
    <x-slot:heading>
        Jobs page
    </x-slot:heading>

    <ul>
        @foreach($jobs as $job)
            <li>
                <a href="/jobs/{{$job['id']}}">
                    <strong>{{$job['title']}}: </strong> Pays {{$job['salary']}}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
