<script>
    import { site_logo, site_favicon } from '@/js/stores/helpers.js';
    import { inertia, page } from '@inertiajs/svelte';

    $: page_title = $page.props.page_title;
</script>

<header>
    <div class="h-10.5 bg-black">
        <div class="container w-full mx-auto max-w-340 relative px-6 sm:px-6 md:px-15 lg:px-20">
            <div class="flex items-center space-between">
                <div class="mr-3.75 flex items-center">
                    <span class="text-white">10, Oct 2022</span>
                </div>
            </div>
            
        </div>
    </div>
</header>