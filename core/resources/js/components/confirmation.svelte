<script>
    import { onMount } from 'svelte';
    import { useForm } from '@inertiajs/svelte';
    import { default as jq } from 'jquery';

    let action_url = '';
    const form = useForm();

    onMount(() => {
        jq(document).on('click', '.confirm', function () {
            const data = jq(this).data();
            action_url = data.action;
            const modal = jq('#confirm');
            modal.find('#dialog-body').text(data.question);
        });
    });

    function submit(e) {
        e.preventDefault()
        $form.post((action_url), {
            preserveScroll: true,
            onSuccess: () => {
                $form.reset(); // reset the form data
                jq('#confirm')[0].close();
            },
        });
    }

</script>


<el-dialog>
    <dialog id="confirm" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
        <el-dialog-backdrop class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

        <!-- svelte-ignore a11y_no_noninteractive_tabindex -->
        <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
            <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                <!-- svelte-ignore component_name_lowercase -->
                <form onsubmit={submit}>
                    <div class="bg-white-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-blue-500/10 sm:mx-0 sm:size-10">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 text-blue-500">
                                    <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="mt-3 text-start sm:mt-0 sm:ml-4">
                                <h3 id="dialog-title" class="text-base font-semibold text-gray-700">Confirmation Alert!</h3>
                                <div class="mt-2">
                                    <p id="dialog-body" class="text-sm text-gray-400"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-200/25 px-4 py-3 border-t border-gray-200 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="submit" disabled={$form.processing} class="inline-flex w-full items-center justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white hover:bg-blue-500 sm:ml-3 sm:w-auto">
                            {#if $form.processing}
                                <svg aria-hidden="true" role="status" class="inline w-3 h-3 me-1 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                </svg>
                            {/if}
                            Yes
                        </button>
                        <button type="button" command="close" commandfor="confirm" class="mt-3 inline-flex w-full justify-center rounded-md bg-gray-900/90 px-3 py-2 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-gray-900/70 sm:mt-0 sm:w-auto">Cancel</button>
                    </div>
                </form>
            </el-dialog-panel>
        </div>
    </dialog>
</el-dialog>
