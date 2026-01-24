<script>
    import { site_logo, site_favicon, get_image } from '@/js/stores/helpers.js';
    import { inertia, page, useForm } from '@inertiajs/svelte';

    $: page_title = $page.props.page_title;
</script>
