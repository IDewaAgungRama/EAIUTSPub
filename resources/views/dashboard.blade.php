<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-y-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Product Data Management
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(count($products) > 0)
                    <div class="grid grid-cols-3 gap-8">
                        @foreach($products as $data)
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                            <div class="bg-center bg-no-repeat bg-cover rounded-t-lg"
                                style="background-image: url('http://127.0.0.1:8080/storage/productPhoto/{{ $data['photo'] }}')">
                                <img class="invisible" src="{{ asset('assets/logo.png') }}" alt="Logo" />
                            </div>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                        {{ $data['name'] }}</h5>
                                </a>
                                <p class="text-sm font-medium text-gray-600">{{ $data['category'] }}</p>
                                <p class="mb-3 font-normal text-gray-700">{{ $data['description'] }}</p>
                                <div class="flex items-center gap-x-5">
                                    <button data-modal-target="deleteModal_{{ $data['id'] }}" data-modal-toggle="deleteModal_{{ $data['id'] }}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        Delete
                                    </button>
                                    <button data-modal-target="editModal_{{ $data['id'] }}"
                                        data-modal-toggle="editModal_{{ $data['id'] }}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Edit modal -->
                        <div id="editModal_{{ $data['id'] }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <form action="{{ route('product.update', $data['id'] ) }}" class="relative bg-white rounded-lg shadow"
                                    method="post">
                                    @csrf
                                    @method('patch')
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                        <h3 class="text-xl font-semibold text-gray-900">
                                            Edit Product
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                            data-modal-hide="modal_add">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <div>
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900">Product
                                                Name</label>
                                            <input type="text" id="name" name="name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                value="{{ $data['name'] }}" required />
                                        </div>
                                        <div>
                                            <label for="category"
                                                class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                                            <select id="category" name="category"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                required>
                                                <option value="">Select Category</option>
                                                <option value="Elektronik"
                                                    {{ $data['category'] === 'Elektronik' ? 'selected' : '' }}>
                                                    Elektronik</option>
                                                <option value="Perkakas"
                                                    {{ $data['category'] === 'Perkakas' ? 'selected' : '' }}>Perkakas
                                                </option>
                                                <option value="Perabot"
                                                    {{ $data['category'] === 'Perabot' ? 'selected' : '' }}>Perabot
                                                </option>
                                                <option value="Pajangan"
                                                    {{ $data['category'] === 'Pajangan' ? 'selected' : '' }}>Pajangan
                                                </option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="description"
                                                class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                            <textarea id="description" name="description"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                required>{{ $data['description'] }}</textarea>
                                        </div>
                                        <div>
                                            <label for="price"
                                                class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                                            <input type="number" id="price" name="price"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                value={{ $data['price'] }} required />
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Submit</button>
                                        <button data-modal-hide="modal_add" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Delete Modal -->
                        <div id="deleteModal_{{ $data['id'] }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="deleteModal_{{ $data['id'] }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <form action="{{ route('product.destroy', $data['id']) }}" method="post" class="p-4 md:p-5 text-center">
                                        @csrf
                                        @method('delete')
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500">Are you
                                            sure you want to delete this product?</h3>
                                        <button type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Yes, I'm sure
                                        </button>
                                        <button data-modal-hide="deleteModal_{{ $data['id'] }}" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No,
                                            cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                    @else
                    No Data
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
