<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="department"
                                class="block text-gray-700 text-sm font-bold mb-2">Department:</label>
                            <select wire:model="employee.department_id" id="department"
                                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">---Select Department---</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('employee.department_id')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <x-form.input.text name="employee.name" for="name" class="name" id="name" />
                        <x-form.input.email name="employee.email" for="email" class="email" id="email" />
                        <x-form.input.text name="employee.phone" for="phone" class="phone" id="phone" />
                        <x-form.input.text name="employee.salary" for="salary" class="salary" id="salary" />
                        <div class="mb-4">
                            <label for="DOB"
                                class="block text-gray-700 text-sm font-bold mb-2">DOB:</label>
                            <input type="date" id="DOB"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Enter DOB" wire:model="employee.dob">
                            @error('employee.dob')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <x-form.input.image name="photo" for="photo" class="photo" id="photo" />

                        <div class="mb-4">
                            <label for="Status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                            <select wire:model="employee.status" id="status"
                                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @foreach ($statuses as $key => $label)
                                    <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('employee.status')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <x-form.input.button type="button" label="Save" event-action="store()"
                            event-name="click.prevent"
                            class="save btn inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                            id="save" />
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <x-form.input.button type="button" label="Cancel" event-action="closeModal()"
                            event-name="click.prevent"
                            class="cancel btn inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                            id="close" />
                    </span>
            </form>
        </div>

    </div>
</div>
</div>
