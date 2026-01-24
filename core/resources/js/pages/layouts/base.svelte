<script>
    import toast from '@/js/components/toast.svelte';
    import { onMount } from "svelte";

    onMount(() => {
        window.HSStaticMethods.autoInit();
    });
</script>

<style>

</style>

<main class="">
    <slot />
    <svelte:component this={ toast }></svelte:component>
</main>

