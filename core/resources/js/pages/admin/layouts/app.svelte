<script>
    import layout  from '@/js/pages/admin/layouts/master.svelte';
    import sidenav from '@/js/pages/admin/partials/sidenav.svelte';
    import topnav  from '@/js/pages/admin/partials/topnav.svelte';

    let open = false

    function toggle_sidebar() {
        open = !open
    }
</script>



<svelte:component this={layout}>
    <div class="min-h-screen">

        <!-- Sidebar -->
        <svelte:component this={sidenav} bind:open></svelte:component>

        <!-- Top Nav -->
        <svelte:component this={topnav} on:toggle={toggle_sidebar}></svelte:component>


        <main class="lg:ml-64 h-auto px-[30px] py-[25px] max-[575px]:px-2.5 max-[575px]:py-[25px]">

            <slot></slot>

        </main>
    </div>

</svelte:component>
