<script>
   export let title = ''; // the page title
</script>


<div class="flex mb-8 flex-wrap gap-3 justify-between items-center">
    <h6 class="inline-block text-xl font-semibold">{title}</h6>
    <div class="flex flex-wrap justify-end gap-2 items-center breadcrumb-plugins">
        <slot></slot>
    </div>
</div>


