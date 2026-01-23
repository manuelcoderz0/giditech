<script>
    import toast from '@/js/components/toast.svelte';
</script>



<main>
    <slot />

    <svelte:component this={ toast }></svelte:component>
</main>





