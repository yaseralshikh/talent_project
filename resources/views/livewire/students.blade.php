<div>
    <div class="container px-4 mx-auto sm:px-8">
        <div class="py-8">

            <div class="relative">
                <div class="absolute bottom-0 left-0">
                    <a wire:click.prevent="export"
                        role="button"
                        href="#"
                        class="p-2 pl-2 pr-2 text-green-500 text-green-700 bg-transparent border-2 border-green-500 rounded-lg text-1xl text-md hover:bg-green-500 hover:text-gray-100 focus:border-2 focus:border-green-300">
                        <i class="fas fa-file-excel"></i> Excel
                    </a>
                </div>
            </div>

            <div class="flex flex-col my-2 sm:flex-row">
                <div class="flex flex-row mb-1 sm:mb-0">
                    <div class="relative">
                        <select wire:change="changeStatus($event.target.value)" class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border border-gray-400 rounded-l appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value='' >@lang('site.status')</option>
                            <option value='1'>@lang('site.updated')</option>
                            <option value='0'>@lang('site.unupdated')</option>
                        </select>
                    </div>
                </div>
                <div class="relative block">
                    <span class="absolute inset-y-0 left-0 flex items-center h-full pl-2">
                        <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-500 fill-current">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </span>
                    <input wire:model="search" type="text" wire:model="search" type="text" placeholder="{{ __('site.search') }}" class="block w-full py-2 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 bg-white border border-b border-gray-400 rounded-l rounded-r appearance-none sm:rounded-l-none focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                </div>
                {{-- <div class="flex flex-row mt-2 mb-1 mr-3 sm:mb-0">
                    <div class="relative">
                        {{$students->where('status', true)->count()}} / {{ $students->total() }}
                    </div>
                </div> --}}
            </div>

            @if(count($students) > 0)

                <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                    <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                        <table class="min-w-full leading-normal">
                            <thead class="text-center">
                                <tr>
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">#</th>
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        <a wire:click.prevent="sortBy('name')" role="button" href="#"> @lang('site.name') @include('includes._sort-icon', ['field' => 'name'])</a>
                                    </th>
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        <a wire:click.prevent="sortBy('school_id')" role="button" href="#"> @lang('site.school') @include('includes._sort-icon', ['field' => 'school_id'])</a>
                                    </th>
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        <a wire:click.prevent="sortBy('class')" role="button" href="#"> @lang('site.class') @include('includes._sort-icon', ['field' => 'class'])</a>
                                    </th>
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        <a wire:click.prevent="sortBy('stage')" role="button" href="#"> @lang('site.stage') @include('includes._sort-icon', ['field' => 'stage'])</a>
                                    </th>
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">@lang('site.mobile')</th>
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        <a wire:click.prevent="sortBy('status')" role="button" href="#"> @lang('site.status') @include('includes._sort-icon', ['field' => 'status'])</a>
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">@lang('site.edit')
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $index=> $student)
                                    <tr class="text-center">
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $index + 1 }}</p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $student->name }}</p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $student->school->name }}</p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $student->class }}</p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $student->stage }}</p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $student->mobile }}</p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            @if ($student->status == 1)
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-green-200 rounded-full opacity-50"></span>
                                                    <span class="relative">@lang('site.updated')</span>
                                                </span>
                                            @else
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-red-200 rounded-full opacity-50"></span>
                                                    <span class="relative">@lang('site.unupdated')</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <x-jet-button class="mr-1"
                                                wire:click="showUpdateModal({{ $student->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                </svg>
                                            </x-jet-button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="px-5 py-5 bg-white border-t xs:flex-row xs:justify-between">
                            <span class="text-xs text-gray-900 xs:text-sm">
                                {{ $students->appends(request()->query())->links() }}
                            </span>
                        </div>
                    </div>
                </div>
            @endif

            <x-jet-dialog-modal wire:model="modalFormVisible">
                <x-slot name="title">
                    @lang('site.edit_student')
                </x-slot>

                <x-slot name="content">

                    <div class="mt-4">
                        <div class="flex flex-row-reverse space-x-4 space-x-reverse">
                                <div><x-jet-label for="sudent_name" value="{{ __('site.name') }} : "></x-jet-label></div>
                                <div><label class="mr-2 text-indigo-600" for="sudent_name"> {{ $sudent_name }}</label></div>
                          </div>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="school_id" value="{{ __('site.school') }}" />
                        <select name="school_id" id="school_id" wire:model="school_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option hidden>@lang('site.school_choice')</option>
                            @foreach ($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                        @error('school_id')<span class="text-sm font-extrabold text-red-600">{{ $message }}</span>@enderror
                    </div>

                    <div class="mt-4">
                        <div class="flex flex-row-reverse space-x-4 space-x-reverse">
                                <div><x-jet-label for="sudent_class" value="{{ __('site.class') }} : "></x-jet-label></div>
                                <div><label class="mr-2 text-indigo-600" for="sudent_class"> {{ $sudent_class }}</label></div>
                          </div>
                    </div>

                    <div class="mt-4">
                        <div class="flex flex-row-reverse space-x-4 space-x-reverse">
                                <div><x-jet-label for="sudent_stage" value="{{ __('site.stage') }} : "></x-jet-label></div>
                                <div><label class="mr-2 text-indigo-600" for="sudent_stage"> {{ $sudent_stage }}</label></div>
                          </div>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="mobile" value="{{ __('site.mobile') }}"></x-jet-label>
                        <x-jet-input typw="text" id="sudent_mobile" wire:model.debounce.500ms="sudent_mobile"
                            class="block w-full mt-1 bg-gray-200 focus:bg-white"  pattern="^([0-9]+([\.][0-9]+)?)|([\u0660-\u0669]+([\.][\u0660-\u0669]+)?)$"></x-jet-input>
                        @error('sudent_mobile')<span
                            class="text-sm font-extrabold text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="sudent_status" value="{{ __('site.status') }}" />
                        <select name="sudent_status" id="sudent_status" wire:model="sudent_status" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option hidden>@lang('site.status_choice')</option>
                            <option value="1">@lang('site.updated')</option>
                            <option value="0">@lang('site.unupdated')</option>
                        </select>
                        @error('sudent_status')<span class="text-sm font-extrabold text-red-600">{{ $message }}</span>@enderror
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
</div>
