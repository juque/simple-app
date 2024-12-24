<x-front-page-layout>

<div class="relative overflow-x-auto">


  <!-- Search Form -->
  <form action="{{ route('home.index') }}" method="GET">
    <input
        type="text"
        name="search"
        placeholder="Search students"
        value="{{ request('search') }}" />
    <button type="submit">Search</button>
  </form>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
									Given name
                </th>
                <th scope="col" class="px-6 py-3">
									Middle name
                </th>
                <th scope="col" class="px-6 py-3">
                   Surname 
                </th>
                <th scope="col" class="px-6 py-3">
                   Gender
                </th>
            </tr>
        </thead>
        <tbody>
  			@foreach($students as $student )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
									{{ $student->given_name }}
                </th>
                <td class="px-6 py-4">
									{{ $student->middle_name }}
                </td>
                <td class="px-6 py-4">
									{{ $student->surname }}
                </td>
                <td class="px-6 py-4">
									{{ $student->gender }}
                </td>
            </tr>
  			@endforeach
        </tbody>
    </table>
		<div class="mt-5">
			{{ $students->links() }}
		</div>
</div>





</x-front-page-layout>
