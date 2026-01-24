<script>
    import layout  from '@/js/pages/admin/layouts/app.svelte';
    import breadcrumb from '@/js/pages/admin/partials/breadcrumb.svelte';
    import img_up from '@/js/components/image-uploader.svelte';
    import { page, useForm } from '@inertiajs/svelte';
    import SlimSelect from 'slim-select'
    import editor from '@tinymce/tinymce-svelte';
    import 'slim-select/styles'
    import { onMount } from 'svelte';

    $: page_title = $page.props.page_title;
    $: categories   = $page.props.categories;
    $: tinymce_api_key = $page.props.tinymce_api_key;

    $: form = useForm({
        image:  '',
        title:  '',
        category_id: '',
        tags:   '',
        short_description: '',
        description:  '',
        trending: '',
        must_read: '',
    })

    let conf = {
        height: 500,
        menubar: false,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'preview', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic forecolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
    }

    onMount(() => {
        new SlimSelect({
            select: '.category',
            settings: {
                searchText: 'No results found',
                searchPlaceholder: 'Search...'
            }
        });
        new SlimSelect({
            select: '.tags',
            settings: {
                searchText: 'No results found',
                searchPlaceholder: 'Enter Keyword...'
            },
            events: {
                addable: function (value) { return value },
            }
        });
    });
   

    function submit(e) {
        e.preventDefault()
        $form.post( route('admin.post.store', $form.id ?? 0), {
            preserveScroll: true,
        });
    }
</script>


<svelte:head>
    <title>{ page_title }</title>
</svelte:head>


<style>
    @media (min-width: 768px) {
        .md\:grid-cols-12 {
            grid-template-columns: repeat(12, minmax(0, 1fr));
        }
    }
</style>

<svelte:component this={ layout }>
    <svelte:component this={ breadcrumb } title="{ page_title }">

    </svelte:component>

    <div class="">
        <form onsubmit={submit} class="grid grid-cols-1 md:grid-cols-12 gap-4">
            <div class="col-span-12 md:col-span-4">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-800">Post Image</label>
                <svelte:component this={ img_up } bind:image={ $form.image } type="post" required={false} />
                {#if $form.errors.image}
                    <small class="form-error text-red-600">{$form.errors.image}</small>
                {/if}
            </div>
            <div class="col-span-12 md:col-span-8">
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-800">Post Title</label>
                    <input type="text" id="title" bind:value={$form.title} class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-neutral-300" required />
                </div>

                <div class="mb-5">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-800">Category</label>
                    <select name="category_id" id="category" bind:value={$form.category_id} style="background-color: #f9fafb; border: 1px solid #d1d5db; font-weight: 500; color: #4b5563; font-size: 0.875rem; border-radius: 0.5rem; padding: 0.625rem;" class="category" required>
                        {#each categories as category}
                            <option style="font-size: 0.875rem; font-color: #4b5563;" value={category.id}>{category.name}</option>
                        {/each}
                    </select>
                </div>
            
                <div class="mb-5">
                    <label for="short_description" class="block mb-2 text-sm font-medium text-gray-800">Short Description</label>
                    <textarea id="short_description" bind:value={$form.short_description}  rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-neutral-300" required></textarea>
                </div>
      
            </div>

            <div class="col-span-12">
                

                <div class="mb-5">
                    <label for="tags" class="block mb-2 text-sm font-medium text-gray-800">Tags</label>
                    <select name="tags" id="tags" bind:value={$form.tags} style="background-color: #f9fafb; border: 1px solid #d1d5db; font-weight: 500; color: #4b5563; font-size: 0.875rem; border-radius: 0.5rem; padding: 0.625rem;" class="tags" multiple required>
                        {#if $form.tags}
                            {#each $form.tags as tag}
                                <option style="font-size: 0.875rem; font-color: #4b5563;" value={tag.id}>{tag.name}</option>
                            {/each}
                        {/if}
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-5">
                    <div class="">
                        <label for="trending" class="block mb-2 text-sm font-medium text-gray-800">Trending</label>
                        <label class="block cursor-pointer w-full">
                            <input id="trending" bind:checked={$form.trending} type="checkbox" class="peer hidden"/>
                            <div class="px-4 py-2 text-sm text-center rounded-lg transition bg-red-600 text-white peer-checked:bg-green-600 peer-checked:[&_.enable]:hidden peer-checked:[&_.disable]:inline">
                                <span class="enable">No</span>
                                <span class="disable hidden">Yes</span>
                            </div>
                        </label>
                    </div>

                    <div class="">
                        <label for="must_read" class="block mb-2 text-sm font-medium text-gray-800">Must Read</label>
                        <label class="block cursor-pointer w-full">
                            <input id="must_read" bind:checked={$form.must_read} type="checkbox" class="peer hidden"/>
                            <div class="px-4 py-2 text-sm text-center rounded-lg transition bg-red-600 text-white peer-checked:bg-green-600 peer-checked:[&_.enable]:hidden peer-checked:[&_.disable]:inline">
                                <span class="enable">No</span>
                                <span class="disable hidden">Yes</span>
                            </div>
                        </label>
                    </div>

                    <div class="">
                        <label for="trending" class="block mb-2 text-sm font-medium text-gray-800">Trending</label>
                        <label class="block cursor-pointer w-full">
                            <input id="trending" bind:checked={$form.trending} type="checkbox" class="peer hidden"/>
                            <div class="px-4 py-2 text-sm text-center rounded-lg transition bg-red-600 text-white peer-checked:bg-green-600 peer-checked:[&_.enable]:hidden peer-checked:[&_.disable]:inline">
                                <span class="enable">No</span>
                                <span class="disable hidden">Yes</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-800">Description</label>
                    <svelte:component this={editor} apiKey={tinymce_api_key} bind:value={$form.description} conf={conf}/>
                </div>

                <button type="submit" disabled={$form.processing} class="h-10 inline-flex w-full items-center justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white hover:bg-blue-500 mt-1">
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
            </div>
        </form>
    </div>
</svelte:component>
