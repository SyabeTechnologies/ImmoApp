
var dataCacheName = 'HotelAppData-v1';
self.addEventListener('install', e => {
    console.log('[ServiceWorker] Install');
   e.waitUntil(
       caches.open('my-pwa-caches').then(cache => {
            return cache.addAll([
                '/HotelApp/',
                '/HotelApp/index.php',
               '/HotelApp/images/hotel.png',
                '/HotelApp/php/check.php',
               '/HotelApp/php/header.php',
                '/HotelApp/php/nav.php',
                '/HotelApp/js/bootstrap.js',
                '/HotelApp/js/jquery.min.js',
                '/HotelApp/manifest.json',
                '/HotelApp/service-worker.js'
            ], { credentials: 'same-origin', redirect: 'follow' });
        })
    );
});

self.addEventListener('activate', function (e) {
    console.log('[ServiceWorker] Activate');
    e.waitUntil(
        caches.keys().then(function (keyList) {
            return Promise.all(keyList.map(function (key) {
                if (key !== 'my-pwa-caches' && key !== dataCacheName) {
                    console.log('[ServiceWorker] Removing old cache', key);
                    return caches.delete(key);
                }
            }));
        })
    );
    return self.clients.claim();
});


self.addEventListener('fetch', function (event) {
    console.log('[ServiceWorker] Fetch', event.request.url);
   if (event.request.cache == 'only-if-cached' &&  event.request.mode != 'same-origin')
        return;            
    event.respondWith(
        caches.match(event.request).then(function (response) {
            if (response) {
                // retrieve from cache
                return response;
            }
            var fetchRequest = event.request.clone()

            return fetch(fetchRequest).then(response => {
                if (!response || response.status !== 200 || response.type !== 'basic') {
                    return response
                }
                var responseToCache = response.clone()
                caches.open('my-pwa-caches').then(cache => cache.put(event.request, responseToCache))
                return response
            })
        })
    );
});
