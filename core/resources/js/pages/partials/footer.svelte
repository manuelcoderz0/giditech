<script>
    import { site_logo, site_favicon, get_image } from '@/js/stores/helpers.js';
    import { inertia, page, useForm } from '@inertiajs/svelte';

</script>

<style>
	.s-dark {
        border-top: 5px solid;
        border-image: linear-gradient(135deg,#900068,#000);
        border-image-slice: 1;  
    }		
</style>


<footer class="s-dark mt-15">
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