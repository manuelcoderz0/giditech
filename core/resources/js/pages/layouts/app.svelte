<script>
    import layout from '@/js/pages/layouts/base.svelte';
    import header from '@/js/pages/partials/header.svelte';
    import footer from '@/js/pages/partials/footer.svelte';

</script>


<svelte:component this={layout}>
    <div class="">
        <svelte:component this={header}></svelte:component>

            <slot />

        <svelte:component this={footer}></svelte:component>
    </div>
</svelte:component>

