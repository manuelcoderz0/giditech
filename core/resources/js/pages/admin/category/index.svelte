<script>
    import layout  from '@/js/pages/admin/layouts/app.svelte';
    import breadcrumb from '@/js/pages/admin/partials/breadcrumb.svelte';
    import confirmation from '@/js/components/confirmation.svelte';
    import searchform from '@/js/components/search-form.svelte';
    import { useForm, page, inertia } from '@inertiajs/svelte';
    import { onMount } from 'svelte';
    import { default as jq } from 'jquery';


    $: page_title = $page.props.page_title;
    $: categories = $page.props.categories;

    $: form = useForm({
        id: '',
        name: '',
        description: '',
    })

    onMount(() => {
        jq(document).on('click', '.add', function () {
            $form.reset();
            const modal = jq('#edit');
            modal.find('#dialog-title').text('Add New Category');
        });

        jq(document).on('click', '.edit', function () {
            $form.reset();
            const data = jq(this).data();
            const modal = jq('#edit');
            modal.find('#dialog-title').text('Update Category');
            $form.id = data.id;
            $form.name = data.name;
            $form.description = data.description;
        });
    });

    function submit(e) {
        e.preventDefault()
        $form.post(route('admin.category.store', $form.id ?? 0), {
            preserveScroll: true,
            onSuccess: () => {
                $form.reset();
                jq('#edit')[0].close();
            },
        });
    }
</script>

<svelte:head>
    <title>{ page_title }</title>
</svelte:head>


<style>
    @media (min-width: 640px) {
        .sm\:table-cell {
            display: table-cell;
        }
    }
    @media (min-width: 768px) {
        .md\:table-cell {
            display: table-cell;
        }
    }
</style>


<svelte:component this={ layout }>
    <svelte:component this={ breadcrumb } title="{ page_title }">
        <svelte:component this={ searchform }></svelte:component>

        <button command="show-modal" commandfor="edit" type="button" class="text-blue-700 border border-blue-700 hover:bg-blue-800 focus:outline-none  font-medium rounded px-3 py-2 text-sm text-center hover:text-white inline-flex items-center add">
            <svg class="w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 4V20M20 12H4"  />
            </svg>
            Add New
        </button>
    </svelte:component>


    <div class="grid grid-cols-1">
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8 overflow-x-auto">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-700 sm:pl-6">Name</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-700 hidden md:table-cell">Status</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 bg-white">

                                {#each categories.data as category}
                                    <tr>
                                        <td class="w-full max-w-0 truncate whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-700 sm:w-auto sm:pl-6 sm:max-w-none">
                                            { category.name }
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 hidden md:table-cell">
                                            {@html category.status_badge}
                                        </td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <div class="flex flex-wrap justify-end gap-2">
                                                <div class="flex gap-2">
                                                    <button command="show-modal" commandfor="edit" data-id="{category.id}" data-name="{category.name}" data-description="{category.description}" type="button" class="px-2 py-1 text-xs font-medium text-center inline-flex items-center text-white rounded focus:outline-none bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 edit">
                                                        <svg class="w-2.5 h-2.5 text-white me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" >
                                                            <path d="M3.78181 16.3092L3 21L7.69086 20.2182C8.50544 20.0825 9.25725 19.6956 9.84119 19.1116L20.4198 8.53288C21.1934 7.75922 21.1934 6.5049 20.4197 5.73126L18.2687 3.58024C17.495 2.80658 16.2406 2.80659 15.4669 3.58027L4.88841 14.159C4.30447 14.7429 3.91757 15.4947 3.78181 16.3092Z"/>
                                                            <path d="M14 6L18 10"/>
                                                        </svg>
                                                        Edit
                                                    </button>

                                                    {#if category.status}
                                                        <button command="show-modal" commandfor="confirm" data-question="Are you sure to disable this category? This action can be undone." data-action="{ route('admin.category.status', category.id) }" type="button" class="px-2 py-1 text-xs font-medium text-center inline-flex items-center text-white rounded focus:outline-none bg-red-600 hover:bg-red-700 focus:ring-red-800 confirm">
                                                            <svg class="size-3 me-1 stroke-2 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none">
                                                                <path d="M14.5 8C14.5 5.23858 12.2614 3 9.5 3C6.73858 3 4.5 5.23858 4.5 8C4.5 10.7614 6.73858 13 9.5 13C12.2614 13 14.5 10.7614 14.5 8Z"  stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M2.5 20C2.5 16.134 5.63401 13 9.5 13C10.5736 13 11.5907 13.2417 12.5 13.6736" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M15.55 15.05L20.45 19.95M21.5 17.5C21.5 15.567 19.933 14 18 14C16.067 14 14.5 15.567 14.5 17.5C14.5 19.433 16.067 21 18 21C19.933 21 21.5 19.433 21.5 17.5Z"  stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                            Disable
                                                        </button>
                                                    {:else}
                                                        <button command="show-modal" commandfor="confirm" data-question="Are you sure to enable this category? This action can be undone." data-action="{ route('admin.category.status', category.id) }" type="button" class="px-2 py-1 text-xs font-medium text-center inline-flex items-center text-white rounded focus:outline-none bg-green-600 hover:bg-green-700 focus:ring-green-800 confirm">
                                                            <svg class="size-3 me-1 stroke-2 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                                                <path d="M15 8C15 5.23858 12.7614 3 10 3C7.23858 3 5 5.23858 5 8C5 10.7614 7.23858 13 10 13C12.7614 13 15 10.7614 15 8Z" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M3 20C3 16.134 6.13401 13 10 13C11.9587 13 13.7295 13.8045 15 15.101"  stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M13 18.5C13 18.5 14.3485 19.0067 15 21C15 21 18.1765 16 21 15" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                            Enable
                                                        </button>
                                                    {/if}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                {:else}
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-sm text-gray-500">
                                            No categories found.
                                        </td>
                                    </tr>
                                {/each}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <el-dialog>
        <dialog id="edit" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
            <el-dialog-backdrop class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

            <!-- svelte-ignore a11y_no_noninteractive_tabindex -->
            <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full min-w-[350px] sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                    <form onsubmit={submit}>
                        <div class="bg-white-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-blue-500/10 sm:mx-0 sm:size-10">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 text-blue-500">
                                        <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="mt-2 text-start sm:mt-0 sm:ml-4 flex-1">
                                    <h3 id="dialog-title" class="text-base font-semibold text-gray-700"></h3>
                                    <input type="hidden" name="id" bind:value={$form.id}/>
                                    <div class="w-full mt-3">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-500">Name</label>
                                        <input type="text" bind:value={$form.name} id="name" class="bg-gray-50 border border-gray-300 font-medium text-gray-600 placeholder:text-gray-400 text-sm rounded-lg block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500" required />
                                    </div>
                                    <div class="w-full mt-3">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-500">Description</label>
                                        <textarea rows="5" bind:value={$form.description} id="description" class="bg-gray-50 border border-gray-300 font-medium text-gray-600 placeholder:text-gray-400 text-sm rounded-lg block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-200/25 px-4 py-3 border-t border-gray-200 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit" disabled={$form.processing} class="inline-flex w-full items-center justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white hover:bg-blue-500 sm:ml-3 sm:w-auto">
                                {#if $form.processing}
                                    <svg aria-hidden="true" role="status" class="inline w-4 h-4 me-2 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                    </svg>
                                    Loading...
                                {:else}
                                    Submit
                                {/if}
                            </button>
                            <button type="button" command="close" commandfor="edit" class="mt-3 inline-flex w-full justify-center rounded-md bg-gray-900/90 px-3 py-2 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-gray-900/70 sm:mt-0 sm:w-auto">Cancel</button>
                        </div>
                    </form>
                </el-dialog-panel>
            </div>
        </dialog>
    </el-dialog>



    <svelte:component this={ confirmation }></svelte:component>
</svelte:component>

