<script>
    import layout from '@/js/pages/admin/layouts/master.svelte';
    import { get_image } from '@/js/stores/helpers.js';
    import { page, inertia, useForm } from '@inertiajs/svelte';
    import { Turnstile as turnstile } from 'svelte-turnstile';

    $: page_title = $page.props.page_title;

    $: form = useForm({
        username: '',
        password: '',
        captcha:  ''
    })

    function submit(e) {
        e.preventDefault()
        $form.post(route('admin.login'),{
            preserveScroll: true,
            onError: () => {
                $form.reset('password');
            },
        });
    }

</script>

<svelte:head>
    <title>{page_title}</title>
</svelte:head>

<svelte:component this={layout}>
    <section class="bg-[url('{ get_image('assets/admin/images/login.jpg') }')] bg-cover bg-no-repeat min-h-screen flex flex-wrap justify-center items-center relative z-1 overflow-hidden bg-[#3d2bfb] max-[575px]: sm:px-[50px]">
        <div class="container mx-auto">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
                <div class="w-full sm:max-w-md">
                    <div class="relative bg-[#1e157d] rounded-[10px]">
                        <div class="bg-[#3d2bfb] overflow-hidden rounded-[10px]">
                            <div class="px-[30px] py-8 bg-[#3d2bfb] text-center">
                                <h3 class="text-white/80 text-2xl font-bold">{ page_title }</h3>
                                <p class="text-white/80 font-size-[14px]">{ page_title } to { $page.props.site_name } Dashboard</p>
                            </div>
                        </div>

                        <div class="px-7.5 py-10">
                            <form onsubmit={submit} class="">
                                <div class="mb-[15px]">
                                    <label for="username" class="block mb-2 text-sm font-medium text-white/80">Username</label>
                                    <input type="text" bind:value={$form.username} id="username" class="border bg-transparent rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  border-gray-600 text-white dark:focus:border-blue-500" required>
                                </div>

                                <div class="mb-[15px]">
                                    <div class="flex justify-between">
                                        <label for="password" class="block mb-2 text-sm font-medium text-white/80">Password</label>
                                        <a href=""  use:inertia={{ prefetch: true }} class="text-sm font-medium text-blue-300 hover:underline dark:text-primary-500">Forgot password?</a>
                                    </div>
                                    <input type="password" bind:value={$form.password} id="password" class="border bg-transparent rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 border-gray-600 text-white dark:focus:border-blue-500" required>
                                </div>

                                <svelte:component this={turnstile} siteKey="{ $page.props.turnstile.site_key }" size="flexible" on:callback={(e) => { $form.captcha = e.detail.token; }}  />
                                
                                <button type="submit" disabled={$form.processing || !$form.captcha} class="w-full mt-4 bg-[#3d2bfb] hover:bg-[#b0bec5] text-white focus:ring-1 focus:outline-none font-medium rounded-lg text-sm px-5 py-3 text-center inline-flex justify-center items-center disabled:opacity-50 disabled:cursor-not-allowed">
                                    {#if $form.processing  || !$form.captcha}
                                        <svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
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
            </div>
        </div>
    </section>
    
</svelte:component>
