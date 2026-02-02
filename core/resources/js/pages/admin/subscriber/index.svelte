<script>
    import layout  from '@/js/pages/admin/layouts/app.svelte';
    import breadcrumb from '@/js/pages/admin/partials/breadcrumb.svelte';
    import confirmation from '@/js/components/confirmation.svelte';
    import searchform from '@/js/components/search-form.svelte';
        import { DateTime as dt } from 'luxon';
    import { useForm, page, inertia } from '@inertiajs/svelte';
    import { onMount } from 'svelte';
    import { default as jq } from 'jquery';


    $: page_title = $page.props.page_title;
    $: subscribers = $page.props.subscribers;

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
            Send Email
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
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-700 sm:pl-6">Email</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-700 hidden md:table-cell">Date</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 bg-white">

                                {#each subscribers.data as subscriber}
                                    <tr>
                                        <td class="w-full max-w-0 truncate whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-700 sm:w-auto sm:pl-6 sm:max-w-none">
                                            { subscriber.email }
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 hidden md:table-cell">
                                            { dt.fromISO(subscriber.created_at).toFormat('dd LLL yyyy hh:mm a') } 
                                        </td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <div class="flex flex-wrap justify-end gap-2">
                                                <div class="flex gap-2">
                                                
                                                        <button command="show-modal" commandfor="confirm" data-question="Are you sure to remove this subscriber? This action can be undone." data-action="{ route('admin.subscriber.remove', subscriber.id) }" type="button" class="px-2 py-1 text-xs font-medium text-center inline-flex items-center text-white rounded focus:outline-none bg-red-600 hover:bg-red-700 focus:ring-red-800 confirm">
                                                            <svg class="size-3 me-1 stroke-2 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none">
                                                                <path d="M14.5 8C14.5 5.23858 12.2614 3 9.5 3C6.73858 3 4.5 5.23858 4.5 8C4.5 10.7614 6.73858 13 9.5 13C12.2614 13 14.5 10.7614 14.5 8Z"  stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M2.5 20C2.5 16.134 5.63401 13 9.5 13C10.5736 13 11.5907 13.2417 12.5 13.6736" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M15.55 15.05L20.45 19.95M21.5 17.5C21.5 15.567 19.933 14 18 14C16.067 14 14.5 15.567 14.5 17.5C14.5 19.433 16.067 21 18 21C19.933 21 21.5 19.433 21.5 17.5Z"  stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                            Remove
                                                        </button>
                                                   
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                {:else}
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-sm text-gray-500">
                                            No subscribers found.
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

    <svelte:component this={ confirmation }></svelte:component>
</svelte:component>

