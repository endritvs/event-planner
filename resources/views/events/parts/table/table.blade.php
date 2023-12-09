<table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
        <tr>
            <th scope="col" class="px-6 py-3">
                Event Id
            </th>
            <th scope="col" class="px-6 py-3">
                Title
            </th>
            <th scope="col" class="px-6 py-3">
                Description
            </th>
            <th scope="col" class="px-6 py-3">
                Location
            </th>
            <th scope="col" class="px-6 py-3">
                Start Time - End Time
            </th>
            <th scope="col" class="px-6 py-3">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($events as $event)
            <tr class="odd:bg-white even:bg-gray-50  border-b ">
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{$event->id}}
                </th>
                <td class="px-6 py-4">
                    {{$event->title}}
                </td>
                <td class="px-6 py-4">
                    {{$event->description}}
                </td>
                <td class="px-6 py-4">
                    {{$event->location}}
                </td>
                <td class="px-6 py-4">
                    {{$event->start_time}} - {{ $event->end_time}}
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                    <form action="{{route('events.destroy',$event->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ml-1 font-medium text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr class="odd:bg-white even:bg-gray-50  border-b text-center">
                <td colspan="6" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">No Events Found</td>
            </tr>
        @endforelse

    </tbody>
</table>
<div class="px-6 py-4">
    {{$events->links()}}
</div>