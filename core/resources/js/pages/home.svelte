<script>
    import layout  from '@/js/pages/layouts/app.svelte';
    import { inertia, page } from '@inertiajs/svelte';

    $: page_title = $page.props.page_title;
</script>

<svelte:head>
    <title>{ page_title }</title>
</svelte:head>

<svelte:component this={layout}>

</svelte:component>