document.querySelectorAll('[data-twig-component="base-filter-input-field"]').forEach((input) => {
    input.addEventListener('keypress', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();

            const key = input.dataset.queryParam;
            const value = input.value || null;
            const url = new URL(window.location.href);

            if (value === null) {
                url.searchParams.delete(key);
            } else {
                url.searchParams.set(key, value);
            }

            window.location.href = url.pathname + url.search;
        }
    });
});
