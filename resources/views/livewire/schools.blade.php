<div>

    <div class="flex flex-col mt-8">
        <h1 class="h-10 text-lg text-center ">تحديث ارقام جوالات الطلاب الموهوبين</h1>
        <h1 class="text-lg text-center">لضمان استمرارية تقديم الرعاية للطلاب الموهوبين نعمل على تحديث بيانات التواصل</h1>


        <div class="grid grid-cols-12 gap-4">
            <!-- left column -->
            <div class="col-span-3 px-2 py-4 bg-gray-100">
              <select name="school" wire:change="changeSchool($event.target.value)" class="flex w-full">
                <option class="block w-full" value='' selected>اختر المدرسة</option>
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}" class="block w-full">{{ $school->name }} ( {{ $school->students->count() }} )</option>
                @endforeach
              </select>
            </div>
        </div>
    </div>


    <div class="container px-4 mx-auto sm:px-8">
        <div class="py-8">

            @if (count($students) > 0)

                <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                    <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr class="text-center">
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        #
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        @lang('site.name')
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        @lang('site.school')
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        @lang('site.class')
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        @lang('site.stage')
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        @lang('site.status')
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $index => $student)
                                    <tr class="text-center">
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $index + 1 }}</p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $student->name }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $student->school->name }}</p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $student->class }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $student->stage }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            {{-- <span
                                        class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-green-200 rounded-full opacity-50"></span>
                                        <span class="relative">Activo</span>
                                    </span> --}}
                                            @if ($student->status == 1)
                                                <span class="text-green-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </span>
                                            @else
                                                <span class="text-red-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <x-jet-button class="mr-1"
                                                wire:click="showUpdateModal({{ $student->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                </svg>
                                            </x-jet-button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div
                            class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between ">
                            <span class="text-xs text-gray-900 xs:text-sm">
                                Showing 1 to 4 of 50 Entries
                            </span>
                        </div> --}}
                    </div>
                </div>
            @endif

            <x-jet-dialog-modal wire:model="modalFormVisible">
                <x-slot name="title">
                    @lang('site.mobileUpdate')
                </x-slot>

                <x-slot name="content">

                    <div class="mt-4">
                        <x-jet-label for="mobile" value="{{ __('site.mobile') }}"></x-jet-label>
                        <x-jet-input typw="text" id="sudent_mobile" wire:model.debounce.500ms="sudent_mobile"
                            class="block w-full mt-1 bg-gray-200 focus:bg-white"  pattern="^([0-9]+([\.][0-9]+)?)|([\u0660-\u0669]+([\.][\u0660-\u0669]+)?)$"></x-jet-input>
                        @error('sudent_mobile')<span
                            class="text-sm font-extrabold text-red-500">{{ $message }}</span>@enderror
                    </div>

                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('modalFormVisible')">@lang('site.cancel')
                    </x-jet-secondary-button>
                    <x-jet-button class="ml-2" wire:click="update">@lang('site.save')</x-jet-button>
                </x-slot>
            </x-jet-dialog-model>
        </div>
    </div>
