<x-app-layout>
    <div class="dark:text-white my-8 mx-8">
        <a href="{{ route('categories.create') }}" class="bg-red-500 p-4 rounded-md mb-8">
            Create a new category
        </a>
        <table style="width: 100%" class="border my-8">
            <thead>
                <tr>
                    <td>
                        ID
                    </td>
                    <td>
                        Title
                    </td>
                    <td>
                        User
                    </td>
                    <td>
                        Setting
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @forelse ($categories as $category)
                        <td>
                            {{ $category->id }}
                        </td>
                        <td>
                            {{ $category->title }}
                        </td>
                        <td>
                            {{ $category->user->name }}
                        </td>
                        <td class="flex space-x-2">
                            <a href="{{ route('categories.edit', ['category'=> $category]) }}">
                                edit
                            </a>
                            <a href="{{ route('categories.show', ['category'=> $category]) }}">
                                show
                            </a>
                            <form action="{{ route('categories.destroy', ['category'=> $category]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit">
                                    delete
                                </button>
                            </form>
                        </td>
                    @empty
                        <td colspan="3">
                            No categories found.
                        </td>
                    @endforelse
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>