<script>
    import { createEventDispatcher, onMount } from 'svelte';
    import { get_image } from '@/js/stores/helpers.js';


    export let type = null;
    export let image = null;
    export let path = null;
    export let size = null;
    export let height = "280";
    export let name = "image";
    export let id = "image-upload-input-1";
    export let accept = ".png, .jpg, .jpeg, .webp";
    export let required = true;
    export let info = true;
    export let theme = 'light';

    const dispatch = createEventDispatcher();
    let preview = null;

    onMount(() => {
        // If preview not set and image exists, use imagePath or generate it
        if (!preview && image) {
            preview = path ?? get_image(image, type);
        }
    });


    function handleImageChange(e) {
        const file = e.target.files[0];
        if (file) {
            image = file;
            preview = URL.createObjectURL(file);
            dispatch('change', { file, type });
        }
    }

    
    function handleDrop(e) {
        e.preventDefault();
        const file = e.dataTransfer.files[0];
        if (file) {
            image = file;
            preview = URL.createObjectURL(file);
            dispatch('change', { file, type });
        }
    }

    function allowDrop(e) {
        e.preventDefault();
    }

</script>


{#if theme == 'dark'}
    <div style="height: {height}px" aria-hidden="true" class="w-full rounded-md relative" on:dragover={allowDrop} on:drop={handleDrop}>
        <div class="bg-[#1e1f21] bg-cover bg-no-repeat h-full w-full bg-center rounded-md border-transparent" style="background-image: {preview ? `url('${preview}')` : 'none'}"></div>
        <div class="absolute inline-flex right-[-7px] bottom-[-14px] ">
            <input on:change={handleImageChange}  type="file" id={id} name={name} accept={accept}  class="hidden" required={required}>
            <label for={id} class="w-[40px] h-[40px] rounded-full bg-[#ffb300] border-transparent flex items-center justify-center cursor-pointer mb-0">
                <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 16L7.46967 11.5303C7.80923 11.1908 8.26978 11 8.75 11C9.23022 11 9.69077 11.1908 10.0303 11.5303L14 15.5M15.5 17L14 15.5M21 16L18.5303 13.5303C18.1908 13.1908 17.7302 13 17.25 13C16.7698 13 16.3092 13.1908 15.9697 13.5303L14 15.5" />
                    <path d="M12 2.5C7.77027 2.5 5.6554 2.5 4.25276 3.69797C4.05358 3.86808 3.86808 4.05358 3.69797 4.25276C2.5 5.6554 2.5 7.77027 2.5 12C2.5 16.2297 2.5 18.3446 3.69797 19.7472C3.86808 19.9464 4.05358 20.1319 4.25276 20.302C5.6554 21.5 7.77027 21.5 12 21.5C16.2297 21.5 18.3446 21.5 19.7472 20.302C19.9464 20.1319 20.1319 19.9464 20.302 19.7472C21.5 18.3446 21.5 16.2297 21.5 12" />
                    <path d="M15.5 5.5C16.0898 4.89316 17.6597 2.5 18.5 2.5C19.3403 2.5 20.9102 4.89316 21.5 5.5M18.5 3V9.5"/>
                </svg>
            </label>
        </div>
    </div>
{:else}
    <div aria-hidden="true" class="w-full rounded-md h-[280px] relative" on:dragover={allowDrop} on:drop={handleDrop}>
        <div class="bg-gray-100 bg-cover bg-no-repeat h-full w-full bg-center rounded-md border border-gray-300" style="background-image: {preview ? `url('${preview}')` : 'none'}"></div>
        <div class="absolute inline-flex right-[-7px] bottom-[-14px] ">
            <input on:change={handleImageChange}  type="file" id={id} name={name} accept={accept}  class="hidden" required={required}>
            <label for={id} class="w-[40px] h-[40px] rounded-full bg-blue-600 border-2 border-gray-200 flex items-center justify-center cursor-pointer mb-0">
                <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 16L7.46967 11.5303C7.80923 11.1908 8.26978 11 8.75 11C9.23022 11 9.69077 11.1908 10.0303 11.5303L14 15.5M15.5 17L14 15.5M21 16L18.5303 13.5303C18.1908 13.1908 17.7302 13 17.25 13C16.7698 13 16.3092 13.1908 15.9697 13.5303L14 15.5" />
                    <path d="M12 2.5C7.77027 2.5 5.6554 2.5 4.25276 3.69797C4.05358 3.86808 3.86808 4.05358 3.69797 4.25276C2.5 5.6554 2.5 7.77027 2.5 12C2.5 16.2297 2.5 18.3446 3.69797 19.7472C3.86808 19.9464 4.05358 20.1319 4.25276 20.302C5.6554 21.5 7.77027 21.5 12 21.5C16.2297 21.5 18.3446 21.5 19.7472 20.302C19.9464 20.1319 20.1319 19.9464 20.302 19.7472C21.5 18.3446 21.5 16.2297 21.5 12" />
                    <path d="M15.5 5.5C16.0898 4.89316 17.6597 2.5 18.5 2.5C19.3403 2.5 20.9102 4.89316 21.5 5.5M18.5 3V9.5"/>
                </svg>
            </label>
        </div>
    </div>
{/if}

{#if info}
    <div class="mt-1">
        <small class="text-xs text-gray-500">
            Supported Files: <b>{accept}</b>.
            {#if size}Image will be resized to <b>{size}</b>{/if}
        </small>
    </div>
{/if}
