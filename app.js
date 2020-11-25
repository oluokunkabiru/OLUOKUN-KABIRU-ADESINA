if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('sw.j', {scope:"./"})
        .then((reg) => console.log('service worker registered', reg))
        .catch((err) => console.log('service worker failed', err));
}