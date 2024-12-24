<x-front-page-layout>

<div class="relative overflow-x-auto">

    <form class="flex justify-between w-full mb-10" action="{{ route('home.index') }}" method="GET">
      <div class='max-w-md mx-auto'>
          <div class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
              <div class="grid place-items-center h-full w-12 text-gray-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
              </div>

              <input
                name="search"
                class="peer h-full w-full outline-none text-sm text-gray-700 pr-2"
                type="text"
                value="{{ request('search') }}"
                id="search"
                placeholder="Search students.." 
              /> 
         </div>
      </div>
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
