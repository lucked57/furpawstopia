<!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

   <div id="app5 ">
         <div class="pswp-gallery" id="my-gallery">
            <a
               href="http://pchelykorolev.mcdir.ru/web/img/post/6592a869b4b94.jpeg"
               data-pswp-width="1020"
               data-pswp-height="696"
               target="_blank"
               >
            <img class="img-gallery" 
               src="http://pchelykorolev.mcdir.ru/web/img/post/6592a869b4b94.jpeg"
               alt=""
               />
            </a>
            <a
               href="/web/img/post/6592a7722824d.jpeg"
               data-pswp-width="1500"
               data-pswp-height="1000"
               target="_blank"
               >
            <img class="img-gallery"
               src="/web/img/post/6592a7722824d.jpeg"
               alt=""
               />
            </a>
            <a
               href="/web/img/post/6592a634b4b10.jpeg"
               data-pswp-width="2000"
               data-pswp-height="1428"
               target="_blank"
               >
            <img class="img-gallery"
               src="/web/img/post/6592a634b4b10.jpeg"
               alt=""
               />
            </a>
            <a 
               href="/web/img/post/6592a52622945.jpeg"
               data-pswp-width="2048"
               data-pswp-height="1350"
               target="_blank"
               >
            <img class="img-gallery"
               src="/web/img/post/6592a52622945.jpeg"
               alt=""
               />
            </a>
            <a 
               href="/web/img/post/6592a6fa0c77f.jpeg"
               data-pswp-width="3000"
               data-pswp-height="2000"
               target="_blank"
               >
            <img class="img-gallery"
               src="/web/img/post/6592a6fa0c77f.jpeg"
               alt=""
               />
            </a>
         </div>
      </div>
      <script type='module'>
         import PhotoSwipeLightbox from 'https://cdn.jsdelivr.net/npm/photoswipe@5.3.7/dist/photoswipe-lightbox.esm.js';
         const lightbox = new PhotoSwipeLightbox({
           gallery: '#my-gallery',
           children: 'a',
           pswpModule: () => import('https://cdn.jsdelivr.net/npm/photoswipe@5.3.7/dist/photoswipe.esm.js')
         });
         lightbox.init();
      </script>