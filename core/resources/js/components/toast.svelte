<script>
    import { page } from '@inertiajs/svelte';
    import iziToast from 'izitoast';
    import 'izitoast/dist/css/iziToast.min.css';

    // Reactive declarations to watch for changes in props
    $: {
        const notify = $page.props.session.notify;
        // The check below ensures the code runs only when the notify prop has a value
        if (notify) {
            notify.forEach(msg => {
                iziToast[msg[0]]({
                    message: msg[1],
                    position: "topRight"
                });
            });
        }
    }

    $: {
        const errors = $page.props.errors;
        if (Object.keys(errors).length > 0) {
            Object.values(errors).forEach(bag => {
                if (Array.isArray(bag)) {
                    // Laravel-style errors (array of messages)
                    bag.forEach(error => {
                        iziToast.error({
                            message: error,
                            position: "topRight"
                        });
                    });
                } else if (typeof bag === 'string') {
                    // Fallback case: bag is just a string
                    iziToast.error({
                        message: bag,
                        position: "topRight"
                    });
                }
            });
        }
    }


    // You can also create the global notify function here if needed
    window.notify = function(status, message) {
        if (typeof message === 'string') {
            iziToast[status]({ message, position: 'topRight' });
        } else {
            Object.values(message).forEach(val => {
                iziToast[status]({ message: val, position: 'topRight' });
            });
        }
    }
</script>
