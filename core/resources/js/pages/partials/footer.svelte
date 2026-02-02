<script>
    import { site_logo, site_favicon, get_image } from '@/js/stores/helpers.js';
    import { inertia, page, useForm } from '@inertiajs/svelte';
    $: categories = $page.props.categories;

    $: form = useForm({
        email: '',
    })

    function submit(e) {
        e.preventDefault()
        $form.post(route('subscribe'),{
            preserveScroll: true,
        });
    }

</script>

<style>
	.s-dark {
        border-top: 5px solid;
        border-image: linear-gradient(135deg,#900068,#000);
        border-image-slice: 1;  
    }		
</style>


<footer class="s-dark mt-15 hidden">
    <div class="bg-[#0f0f11] py-13.5">
        <div class="w-full mx-auto max-w-340 relative px-6 sm:px-6 md:px-8 lg:px-20">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-6 lg:col-span-4 mb-12">
                    <h5 class="text-white uppercase text-[15px] font-bold mb-7">Most Popular</h5>
                    <div class="flex flex-col gap-4">
                        <div class="flex gap-4 relative border-b border-[#333339] pb-4">
                            <div class="w-27.5 h-19 mr-4.2 max-w-[40%] shrink-0 relative">
                                <a href="">
                                    <img class="absolute w-full h-full object-cover" src="https://giditech.net/wp-content/uploads/2025/07/Whisk_1735ead336-1024x559.jpg" alt="">
                                </a>
                            </div>
                            
                            <div>
                                <h6 class="text-[#ececec] text-sm font-semibold mb-2">
                                    <a href="">Beyond Connecting Wallets: What Web3 Was Meant to Be</a>
                                </h6>
                                <div class="flex items-center">
                                    <span class="text-[#FFFFFFA6] text-xs mr-4.5">Jan 20, 2024</span>
                                    <span class="text-[#FFFFFFA6] text-xs flex items-center gap-1">
                                        <svg class="stroke-current size-4 stroke-1 fill-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 9V20" />
                                            <path d="M8 4V20" />
                                            <path d="M12 11V20" />
                                            <path d="M16 7V20" />
                                            <path d="M20 14V20" />
                                        </svg>
                                        344 views
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-4 relative">
                            <div class="w-27.5 h-19 mr-4.2 max-w-[40%] shrink-0 relative">
                                <a href="">
                                    <img class="absolute w-full h-full object-cover" src="https://giditech.net/wp-content/uploads/2025/07/Whisk_1735ead336-1024x559.jpg" alt="">
                                </a>
                            </div>
                            
                            <div>
                                <h6 class="text-[#ececec] text-sm font-semibold mb-2">
                                    <a href="">Beyond Connecting Wallets: What Web3 Was Meant to Be</a>
                                </h6>
                                <div class="flex items-center">
                                    <span class="text-[#FFFFFFA6] text-xs mr-4.5">Jan 20, 2024</span>
                                    <span class="text-[#FFFFFFA6] text-xs flex items-center gap-1">
                                        <svg class="stroke-current size-4 stroke-1 fill-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 9V20" />
                                            <path d="M8 4V20" />
                                            <path d="M12 11V20" />
                                            <path d="M16 7V20" />
                                            <path d="M20 14V20" />
                                        </svg>
                                        344 views
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-4 relative border-t border-[#333339] pt-4">
                            <div class="w-27.5 h-19 mr-4.2 max-w-[40%] shrink-0 relative">
                                <a href="">
                                    <img class="absolute w-full h-full object-cover" src="https://giditech.net/wp-content/uploads/2025/07/Whisk_1735ead336-1024x559.jpg" alt="">
                                </a>
                            </div>
                            
                            <div>
                                <h6 class="text-[#ececec] text-sm font-semibold mb-2">
                                    <a href="">Beyond Connecting Wallets: What Web3 Was Meant to Be</a>
                                </h6>
                                <div class="flex items-center">
                                    <span class="text-[#FFFFFFA6] text-xs mr-4.5">Jan 20, 2024</span>
                                    <span class="text-[#FFFFFFA6] text-xs flex items-center gap-1">
                                        <svg class="stroke-current size-4 stroke-1 fill-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 9V20" />
                                            <path d="M8 4V20" />
                                            <path d="M12 11V20" />
                                            <path d="M16 7V20" />
                                            <path d="M20 14V20" />
                                        </svg>
                                        344 views
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 md:col-span-6 lg:col-span-4 mb-12">
                    <h5 class="text-white uppercase text-[15px] font-bold mb-7">Most Popular</h5>
                    <div class="flex flex-col gap-4">
                        <div class="flex gap-4 relative border-b border-[#333339] pb-4">
                            <div class="w-27.5 h-19 mr-4.2 max-w-[40%] shrink-0 relative">
                                <a href="">
                                    <img class="absolute w-full h-full object-cover" src="https://giditech.net/wp-content/uploads/2025/07/Whisk_1735ead336-1024x559.jpg" alt="">
                                </a>
                            </div>
                            
                            <div>
                                <h6 class="text-[#ececec] text-sm font-semibold mb-2">
                                    <a href="">Beyond Connecting Wallets: What Web3 Was Meant to Be</a>
                                </h6>
                                <div class="flex items-center">
                                    <span class="text-[#FFFFFFA6] text-xs mr-4.5">Jan 20, 2024</span>
                                    <span class="text-[#FFFFFFA6] text-xs flex items-center gap-1">
                                        <svg class="stroke-current size-4 stroke-1 fill-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 9V20" />
                                            <path d="M8 4V20" />
                                            <path d="M12 11V20" />
                                            <path d="M16 7V20" />
                                            <path d="M20 14V20" />
                                        </svg>
                                        344 views
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-4 relative">
                            <div class="w-27.5 h-19 mr-4.2 max-w-[40%] shrink-0 relative">
                                <a href="">
                                    <img class="absolute w-full h-full object-cover" src="https://giditech.net/wp-content/uploads/2025/07/Whisk_1735ead336-1024x559.jpg" alt="">
                                </a>
                            </div>
                            
                            <div>
                                <h6 class="text-[#ececec] text-sm font-semibold mb-2">
                                    <a href="">Beyond Connecting Wallets: What Web3 Was Meant to Be</a>
                                </h6>
                                <div class="flex items-center">
                                    <span class="text-[#FFFFFFA6] text-xs mr-4.5">Jan 20, 2024</span>
                                    <span class="text-[#FFFFFFA6] text-xs flex items-center gap-1">
                                        <svg class="stroke-current size-4 stroke-1 fill-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 9V20" />
                                            <path d="M8 4V20" />
                                            <path d="M12 11V20" />
                                            <path d="M16 7V20" />
                                            <path d="M20 14V20" />
                                        </svg>
                                        344 views
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-4 relative border-t border-[#333339] pt-4">
                            <div class="w-27.5 h-19 mr-4.2 max-w-[40%] shrink-0 relative">
                                <a href="">
                                    <img class="absolute w-full h-full object-cover" src="https://giditech.net/wp-content/uploads/2025/07/Whisk_1735ead336-1024x559.jpg" alt="">
                                </a>
                            </div>
                            
                            <div>
                                <h6 class="text-[#ececec] text-sm font-semibold mb-2">
                                    <a href="">Beyond Connecting Wallets: What Web3 Was Meant to Be</a>
                                </h6>
                                <div class="flex items-center">
                                    <span class="text-[#FFFFFFA6] text-xs mr-4.5">Jan 20, 2024</span>
                                    <span class="text-[#FFFFFFA6] text-xs flex items-center gap-1">
                                        <svg class="stroke-current size-4 stroke-1 fill-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 9V20" />
                                            <path d="M8 4V20" />
                                            <path d="M12 11V20" />
                                            <path d="M16 7V20" />
                                            <path d="M20 14V20" />
                                        </svg>
                                        344 views
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 md:col-span-full lg:col-span-4 mb-12">
                    <div class="bg-black border-4 border-[#111] ">
                        <div class="px-8 py-6 max-w-175 text-center mx-auto">
                            <h3 class="text-[24px] text-[#ececec] font-bold mb-4.5 mt-2">Subscribe to Updates</h3>
                            <p class="mb-5.5 text-[#FFFFFFCC] text-sm">Subscribe to our newsletter for the latest updates, in-depth guides, and expert insights delivered straight to your inbox.</p>
                            <form action="" class="max-w-162.5 mx-auto">
                                <div class="">
                                    <input type="text" class="w-full h-11 py-2.5 sm:py-3 px-4 text-center text-[#bbb] text-sm block border-[#333] bg-white/10 rounded mb-3.5" placeholder="Your email address..." />
                                    <input type="submit" class="w-full h-10 py-2.5 sm:py-3 px-4 text-center text-white text-sm font-semibold uppercase block border-[#333] bg-[#900068] rounded mt-2" placeholder="Your email address..." />
                                </div>
                                <div class="flex justify-center mt-5">
                                    <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded-sm text-blue-600 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-default-checkbox">
                                    <label for="hs-default-checkbox" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">By signing up, you agree to the our terms and policy.</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-black flex flex-col justify-center items-center py-14 text-white text-sm gap-5"> 
        <div>
            <div class="flex items-center gap-3">
                <a href="#" aria-label="X" class="flex items-center justify-center size-10.5 p-1 rounded-full bg-[#ffffff1f]">
                    <svg class="size-5.5 text-white stroke-current stroke-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 21L10.5484 13.4516M21 3L13.4516 10.5484M13.4516 10.5484L8 3H3L10.5484 13.4516M13.4516 10.5484L21 21H16L10.5484 13.4516" />
                    </svg>
                </a>
                <a href="#" aria-label="LinkedIn" class="flex items-center justify-center size-10.5 p-1 rounded-full bg-[#ffffff1f]">
                    <svg class="size-5.5 text-white stroke-current stroke-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M4.5 9.5H4C3.05719 9.5 2.58579 9.5 2.29289 9.79289C2 10.0858 2 10.5572 2 11.5V20C2 20.9428 2 21.4142 2.29289 21.7071C2.58579 22 3.05719 22 4 22H4.5C5.44281 22 5.91421 22 6.20711 21.7071C6.5 21.4142 6.5 20.9428 6.5 20V11.5C6.5 10.5572 6.5 10.0858 6.20711 9.79289C5.91421 9.5 5.44281 9.5 4.5 9.5Z" />
                        <path d="M6.5 4.25C6.5 5.49264 5.49264 6.5 4.25 6.5C3.00736 6.5 2 5.49264 2 4.25C2 3.00736 3.00736 2 4.25 2C5.49264 2 6.5 3.00736 6.5 4.25Z" />
                        <path d="M12.326 9.5H11.5C10.5572 9.5 10.0858 9.5 9.79289 9.79289C9.5 10.0858 9.5 10.5572 9.5 11.5V20C9.5 20.9428 9.5 21.4142 9.79289 21.7071C10.0858 22 10.5572 22 11.5 22H12C12.9428 22 13.4142 22 13.7071 21.7071C14 21.4142 14 20.9428 14 20L14.0001 16.5001C14.0001 14.8433 14.5281 13.5001 16.0879 13.5001C16.8677 13.5001 17.5 14.1717 17.5 15.0001V19.5001C17.5 20.4429 17.5 20.9143 17.7929 21.2072C18.0857 21.5001 18.5572 21.5001 19.5 21.5001H19.9987C20.9413 21.5001 21.4126 21.5001 21.7055 21.2073C21.9984 20.9145 21.9985 20.4432 21.9987 19.5006L22.0001 14.0002C22.0001 11.515 19.6364 9.50024 17.2968 9.50024C15.9649 9.50024 14.7767 10.1531 14.0001 11.174C14 10.5439 14 10.2289 13.8632 9.995C13.7765 9.84686 13.6531 9.72353 13.505 9.63687C13.2711 9.5 12.9561 9.5 12.326 9.5Z" />
                    </svg>
                </a>
                <a href="#" aria-label="Tiktok" class="flex items-center justify-center size-10.5 p-1 rounded-full bg-[#ffffff1f]">
                    <svg class="size-5.5 text-white stroke-current stroke-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M2.5 12C2.5 7.52166 2.5 5.28249 3.89124 3.89124C5.28249 2.5 7.52166 2.5 12 2.5C16.4783 2.5 18.7175 2.5 20.1088 3.89124C21.5 5.28249 21.5 7.52166 21.5 12C21.5 16.4783 21.5 18.7175 20.1088 20.1088C18.7175 21.5 16.4783 21.5 12 21.5C7.52166 21.5 5.28249 21.5 3.89124 20.1088C2.5 18.7175 2.5 16.4783 2.5 12Z" />
                        <path d="M10.5359 11.0075C9.71585 10.8916 7.84666 11.0834 6.93011 12.7782C6.01355 14.4729 6.9373 16.2368 7.51374 16.9069C8.08298 17.5338 9.89226 18.721 11.8114 17.5619C12.2871 17.2746 12.8797 17.0603 13.552 14.8153L13.4738 5.98145C13.3441 6.95419 14.4186 9.23575 17.478 9.5057" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="w-full mx-auto max-w-340 relative px-6 sm:px-6 md:px-8 lg:px-20">
           <ul class="flex flex-wrap justify-center gap-4">
                <li>
                    <a href="#" class="hover:text-white/80 uppercase text-[13px] font-bold">Home</a>
                </li>
                <li>
                    <a href="#" class="hover:text-white/80 uppercase text-[13px] font-bold">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:text-white/80 uppercase text-[13px] font-bold">Terms of Service</a>
                </li>
                <li>
                    <a href="#" class="hover:text-white/80 uppercase text-[13px] font-bold">Contact Us</a>
                </li>
           </ul> 
        </div>
        <span class="text-[#777] text-[13px]">© Giditech. All rights reserved.</span>
    </div>
</footer>


<footer class="relative overflow-hidden  px-6 sm:px-6 md:px-8 lg:px-20 w-full text-sm text-white bg-black py-14 s-dark mt-15">
    <div class="">
        <svg class="hidden md:block absolute -bottom-30 -left-80 opacity-5 w-full h-full pointer-events-none" width="68"
            height="26" viewBox="0 0 68 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_8678_1074)">
                <path d="M16.141 0C13.4854 0 10.9387 1.04871 9.06091 2.91543L2.93268 9.00761C1.05492 10.8743 0 13.4061 0 16.0461C0 21.5435 4.48289 26 10.0128 26C12.6684 26 15.2152 24.9512 17.0929 23.0845L21.3319 18.8705C21.3319 18.8705 21.3319 18.8706 21.3319 18.8705L33.6827 6.59239C34.5795 5.70086 35.7958 5.2 37.0641 5.2C39.1874 5.2 40.9876 6.57576 41.6117 8.47953L45.5096 4.60457C43.7314 1.83589 40.6134 0 37.0641 0C34.4085 0 31.8617 1.04871 29.984 2.91543L13.3943 19.4076C12.4974 20.2992 11.2811 20.8 10.0128 20.8C7.37176 20.8 5.23077 18.6716 5.23077 16.0461C5.23077 14.7852 5.73459 13.5761 6.63139 12.6845L12.7596 6.59239C13.6564 5.70086 14.8727 5.2 16.141 5.2C18.2645 5.2 20.0645 6.57582 20.6887 8.47965L24.5866 4.60466C22.8084 1.83595 19.6904 0 16.141 0Z" fill="#364153" />
                <path d="M34.3188 19.4076C33.422 20.2992 32.2056 20.8 30.9373 20.8C28.8143 20.8 27.0143 19.4246 26.39 17.5211L22.4922 21.396C24.2705 24.1643 27.3883 26 30.9373 26C33.5929 26 36.1397 24.9512 38.0175 23.0845L54.6072 6.59239C55.504 5.70086 56.7203 5.2 57.9886 5.2C60.6297 5.2 62.7707 7.32839 62.7707 9.95393C62.7707 11.2148 62.2669 12.4239 61.37 13.3155L55.2419 19.4076C54.345 20.2992 53.1287 20.8 51.8604 20.8C49.7372 20.8 47.9371 19.4243 47.3129 17.5207L43.4151 21.3957C45.1933 24.1642 48.3112 26 51.8604 26C54.516 26 57.0628 24.9512 58.9405 23.0845L65.0687 16.9924C66.9465 15.1257 68.0014 12.5939 68.0014 9.95393C68.0014 4.45652 63.5186 0 57.9886 0C55.333 0 52.7863 1.04871 50.9085 2.91543L34.3188 19.4076Z" fill="#364153" />
            </g>
            <defs>
                <clipPath id="clip0_8678_1074">
                    <rect width="68" height="26" fill="white" />
                </clipPath>
            </defs>
        </svg>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-14">
            <div class="sm:col-span-2 lg:col-span-1">
                <a href="{ route('home') }"  use:inertia={{ prefetch: true }} class="flex-none font-semibold text-xl text-black focus:outline-hidden focus:opacity-80 dark:text-white">
                    <img src="{ site_logo('dark') }" alt="Logo" class="h-10 block -ml-7">
                </a>
                <p class="text-sm/7 mt-6">
                    Your ultimate partner to navigating the Tech Frontier. Discover the latest trends, reviews, and insights in the world of technology.
                </p>
            </div>
            <div class="flex flex-col lg:items-center lg:justify-center">
                <div class="flex flex-col text-sm space-y-2.5">
                    <h2 class="font-semibold mb-5 text-white">Categories</h2>
                    {#each categories.slice(0, 4) as category}
                        <a href="{ route('category.details', category.slug) }" use:inertia={{ prefetch: true }} class="hover:text-slate-600 transition">
                            { category.name }
                        </a>
                    {/each}
                </div>
            </div>
            <div>
                <h2 class="font-semibold text-white mb-5">Subscribe to our newsletter</h2>
                <div class="text-sm space-y-6 max-w-sm">
                    <p>The latest news, articles, and resources, sent to your inbox weekly.</p>
                    <form onsubmit="{ submit }" class="flex items-center">
                        <input type="email" bind:value="{$form.email}" id="email" class="rounded-l-md border-[#333] bg-white/10 outline-none w-full max-w-64 h-11 px-3" placeholder="Enter your email">
                        <button type="submit" disabled={$form.processing} class="bg-[#900068] inline-flex justify-center items-center cursor-pointer transition px-4 h-11 text-white rounded-r-md">
                            {#if $form.processing}
                                <svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                </svg>
                                Validating...
                            {:else}
                                Subscribe
                            {/if}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 py-4 border-t mt-6 border-[#333339]">
            <p class="text-center">
                Copyright 2026 © <a href="https://giditech.net">GidiTech</a>. All Right Reserved.
            </p>
            <div class="flex items-center gap-4">
                {#each $page.props.policies.slice(0, 3) as policy}
                    <a href="" use:inertia={{ prefetch: true }} class="">{ policy.data_values.title }</a>
                {/each}
            </div>
        </div>
    </div>
</footer>