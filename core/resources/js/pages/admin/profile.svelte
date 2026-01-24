<script>
    import layout  from '@/js/pages/admin/layouts/app.svelte';
    import { get_image } from '@/js/stores/helpers.js';
    import { page, useForm } from '@inertiajs/svelte';
    import breadcrump from '@/js/pages/admin/partials/breadcrumb.svelte';
    import img_up from '@/js/components/image-uploader.svelte';


    $: page_title = $page.props.page_title;
    $: admin = $page.props.admin;


    $: form = useForm({
        name:  admin.name,
        email: admin.email,
        image: admin.image
    });

    function submit(e) {
        e.preventDefault()
        $form.post(route('admin.profile.update'),{
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

    <svelte:component {page_title} this={ breadcrump } />

    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
        <div class="md:col-span-3">
            <div class="flex items-center bg-[#4634ff] rounded-t p-3">
                <div class="">
                    <img class="w-[60px] h-[60px] rounded-full" src="{ get_image(admin.image, 'adminProfile') }" alt="">
                </div>
                <div class="ps-3">
                    <h4 class="text-white text-xl">{ admin.name }</h4>
                </div>
            </div>
            <ul class="flex flex-col">
                <li class="inline-flex items-center gap-x-2 justify-between py-2 px-3 text-sm font-medium text-gray-500 bg-white border border-gray-200 mt-0">
                    Name
                    <span class="font-semibold">{ admin.name }</span>
                </li>
                <li class="inline-flex items-center gap-x-2 justify-between py-2 px-3 text-sm font-medium text-gray-500 bg-white border border-gray-200 -mt-px">
                    Username
                    <span class="font-semibold">{ admin.username }</span>
                </li>
                <li class="inline-flex items-center gap-x-2 justify-between py-2 px-3 text-sm font-medium text-gray-500 bg-white border border-gray-200 -mt-px rounded-b-lg">
                    Email
                    <span class="font-semibold truncate">{ admin.email }</span>
                </li>
            </ul>
        </div>
        <div class="md:col-span-9 bg-white rounded p-3">
            <div class="">
                <h4 class="mb-2 border-b border-gray-200 pb-2 text-lg">Profile Information</h4>
            </div>

            <div class="mt-4">
                <form onsubmit={submit} class="grid grid-cols-1 md:grid-cols-12 gap-4">
                    <div class="md:col-span-6">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-500">Image</label>
                        <svelte:component this={ img_up } bind:image={ $form.image } type="adminProfile" required={false} />
                        {#if $form.errors.image}
                            <small class="form-error text-red-600">{$form.errors.image}</small>
                        {/if}
                    </div>
                    <div class="md:col-span-6">
                        <div class="w-full mt-3">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-500">Name</label>
                            <input type="text" bind:value={$form.name} id="name" class="border border-gray-200 font-medium text-gray-600 placeholder:text-gray-400 text-sm rounded-lg block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500" required />
                            {#if $form.errors.name}
                                <small class="form-error text-red-600">{$form.errors.name}</small>
                            {/if}
                        </div>
                        <div class="w-full mt-3">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-500">Email</label>
                            <input type="text" bind:value={$form.email} id="name" class="border border-gray-200 font-medium text-gray-600 placeholder:text-gray-400 text-sm rounded-lg block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500" required />
                            {#if $form.errors.email}
                                <small class="form-error text-red-600">{$form.errors.email}</small>
                            {/if}
                        </div>

                    </div>
                    <button type="submit" disabled={$form.processing} class="col-span-full mt-4 inline-flex w-full items-center justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white hover:bg-blue-500">
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
                </form>
            </div>
        </div>
    </div>

</svelte:component>

