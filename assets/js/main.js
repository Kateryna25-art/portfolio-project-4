 const isWordPress = typeof window.cartData !== 'undefined';
 const siteUrl = isWordPress ? window.cartData.ajax_url.replace(/wp-admin\/admin-ajax\.php$/, '') : '';

 if (document.querySelector('.banner__slider')) {
   new Swiper('.banner__slider', {
     pagination: {
       el: '.swiper-pagination',
       clickable: true,
     },
   });
 }

 if (document.querySelector('.post__slider')) {
   new Swiper('.post__slider', {
     pagination: {
       el: '.swiper-pagination',
       clickable: true,
     },
     loop: true,
   });
 }

 const parsePrice = (text) => Number(text.replace(/[^\d,.]/g, '').replace(',', '.')) || 0;
 const formatPrice = (value) => `$ ${value.toFixed(2).replace('.', ',')}`;

 function updateCartCount(count) {
   const cartCount = document.querySelector('.cart-count');

   if (!cartCount) return;

   if (count > 0) {
     cartCount.textContent = count;
     cartCount.classList.add('active');
   } else {
     cartCount.textContent = '';
     cartCount.classList.remove('active');
   }
 }

 function openBag() {
   const bag = document.querySelector('.shopping-bag');
   const overlay = document.querySelector('.cart-overlay');

   if (bag) {
     bag.classList.add('is-open');
   }
   if (overlay) {
     overlay.classList.add('is-active');
   }
   document.body.classList.add('scroll-lock');
 }

 function closeBag() {
   const bag = document.querySelector('.shopping-bag');
   const overlay = document.querySelector('.cart-overlay');

   if (bag) {
     bag.classList.remove('is-open');
   }
   if (overlay) {
     overlay.classList.remove('is-active');
   }
   document.body.classList.remove('scroll-lock');
 }

 function applyCartFragments(data) {
   const wasOpen = document.querySelector('.shopping-bag')?.classList.contains('is-open');

   if (data && data.fragments) {
     Object.entries(data.fragments).forEach(([selector, html]) => {
       const element = document.querySelector(selector);

       if (element) {
         element.outerHTML = html;
       }
     });
   }

   const bagSub = document.querySelector('.shopping-bag__sub');

   if (bagSub) {
     updateCartCount(parseInt(bagSub.textContent, 10) || 0);
   }

   if (wasOpen) {
     openBag();
   }
 }

 function refreshCartFragments() {
   return fetch(`${siteUrl}?wc-ajax=get_refreshed_fragments`, {
       method: 'POST'
     })
     .then(response => response.json())
     .then(applyCartFragments);
 }

 function updateStaticBag() {
   const items = document.querySelectorAll('.shopping-bag__item');
   let count = 0;
   let subtotal = 0;

   items.forEach((item) => {
     const qty = Number(item.querySelector('.shopping-bag__qty-value')?.textContent) || 0;
     const price = parsePrice(item.querySelector('.shopping-bag__price')?.textContent || '');

     count += qty;
     subtotal += qty * price;
   });

   const bagSub = document.querySelector('.shopping-bag__sub');
   const totalLabel = document.querySelector('.shopping-bag__total-label');
   const totalValue = document.querySelector('.shopping-bag__total-value');
   const list = document.querySelector('.shopping-bag__list');

   if (bagSub) {
     bagSub.textContent = `${count} items`;
   }
   if (totalLabel) {
     totalLabel.textContent = `Subtotal (${count} items)`;
   }
   if (totalValue) {
     totalValue.textContent = formatPrice(subtotal);
   }
   if (list && !items.length && !list.querySelector('.shopping-bag__empty')) {
     list.insertAdjacentHTML('beforeend', '<li class="shopping-bag__empty">Your bag is empty.</li>');
   }

   updateCartCount(count);
 }

 document.addEventListener('DOMContentLoaded', () => {
   const viewAllBtn = document.querySelector('.latest__button');
   const hiddenCards = document.querySelectorAll('.products-grid__content .product__card.is-hidden');

   if (viewAllBtn && hiddenCards.length) {
     viewAllBtn.setAttribute('aria-expanded', 'false');

     viewAllBtn.addEventListener('click', () => {
       const isHidden = hiddenCards[0].classList.contains('is-hidden');

       hiddenCards.forEach(card => card.classList.toggle('is-hidden', !isHidden));
       viewAllBtn.textContent = isHidden ? 'Show Less' : 'View All';
       viewAllBtn.setAttribute('aria-expanded', String(isHidden));
     });
   }

   const range = document.getElementById('range-slider');
   if (range) {

     noUiSlider.create(range, {

       range: {
         'min': 0,
         'max': 180
       },

       step: 10,
       start: [0, 180],
       connect: true,
       behaviour: 'tap-drag',
       tooltips: true,

       pips: {
         mode: 'steps',
         stepped: true,
         density: 4
       }
     });

     const minPriceText = document.getElementById('min-price');
     const maxPriceText = document.getElementById('max-price');

     range.noUiSlider.on('update', function (values) {
       if (minPriceText) {
         minPriceText.textContent = Math.round(values[0]);
       }
       if (maxPriceText) {
         maxPriceText.textContent = Math.round(values[1]);
       }
     });
   }

   const navItems = document.querySelectorAll('.profile-nav__item');
   const contents = document.querySelectorAll('.profile__content');

   const showProfileTab = (id) => {
     const target = document.getElementById(id);

     if (!target || !target.classList.contains('profile__content')) return false;

     contents.forEach(content => content.classList.toggle('is-active', content === target));
     navItems.forEach((item) => {
       const link = item.querySelector('.profile-nav__link');
       item.classList.toggle('is-active', link?.getAttribute('href') === `#${id}`);
     });

     return true;
   };

   if (contents.length) {
     document.addEventListener('click', (e) => {
       const link = e.target.closest('a[href^="#"]');

       if (!link || link.getAttribute('href').length < 2) return;

       if (showProfileTab(link.getAttribute('href').slice(1))) {
         e.preventDefault();
         history.pushState(null, '', link.getAttribute('href'));
       }
     });

     const showTabFromHash = () => {
       showProfileTab(location.hash.slice(1) || contents[0].id);
     };

     window.addEventListener('hashchange', showTabFromHash);
     window.addEventListener('popstate', showTabFromHash);
     showTabFromHash();
   }

   document.querySelectorAll('.profile__addresses-action').forEach((link, index) => {
     link.addEventListener('click', function (event) {

       event.preventDefault();
       const addressType = document.querySelector('#address-type');
       const selectedType = index === 0 ? 'billing' : 'shipping';
       const sameType = addressType && addressType.value === selectedType;

       if (addressType) {
         addressType.value = selectedType;
       }

       const form = document.querySelector('#address-form');

       if (!form) return;

       const addressData = window.profileAddressData?.[selectedType];

       if (addressData) {
         Object.keys(addressData).forEach((field) => {
           const input = form.querySelector(`[name="${field}"]`);

           if (input) {
             input.value = addressData[field];
           }
         });
       }

       const billingOnlyFields = form.querySelectorAll('.billing-only');

       billingOnlyFields.forEach((field) => {
         const input = field.querySelector('input');
         const isShipping = selectedType === 'shipping';

         field.classList.toggle('is-hidden', isShipping);

         if (input) {
           input.required = !isShipping;
         }
       });

       if (sameType) {
         form.classList.toggle('is-hidden');
       } else {
         form.classList.remove('is-hidden');
       }

     });
   });

   const openBagBtn = document.querySelector('.header__cart');

   if (openBagBtn) {
     openBagBtn.addEventListener('click', (e) => {
       e.preventDefault();
       openBag();
     });
   }

   document.addEventListener('click', (e) => {
     if (e.target.closest('.shopping-bag__close') || e.target.closest('.cart-overlay')) {
       e.preventDefault();
       closeBag();
     }
   });

   window.addEventListener('keydown', (e) => {
     if (e.key === 'Escape') {
       closeBag();
     }
   });

   document.addEventListener('click', (e) => {

     const removeBtn = e.target.closest('.shopping-bag__remove');

     if (!removeBtn) return;

     if (!isWordPress) {
       removeBtn.closest('.shopping-bag__item')?.remove();
       updateStaticBag();
       return;
     }

     const formData = new FormData();
     formData.append('cart_item_key', removeBtn.dataset.cartKey);

     fetch(`${siteUrl}?wc-ajax=remove_from_cart`, {
         method: 'POST',
         body: formData
       })
       .then(response => response.json())
       .then(data => {
         if (document.querySelector('.cart__container')) {
           window.location.reload();
           return;
         }

         applyCartFragments(data);
       })
       .catch(error => {
         console.error('Ошибка при удалении:', error);
       });

   });

   document.addEventListener('click', (e) => {
     const qtyBtn = e.target.closest('.shopping-bag__qty-btn');

     if (!qtyBtn) return;
     const cartItem = qtyBtn.closest('.shopping-bag__item');
     const qtyValue = cartItem?.querySelector('.shopping-bag__qty-value');

     if (!qtyValue) return;

     const current = Number(qtyValue.textContent);
     let quantity = current;

     if (qtyBtn.dataset.action === 'increase') {
       quantity++;
     }

     if (qtyBtn.dataset.action === 'decrease' && quantity > 1) {
       quantity--;
     }

     if (quantity === current) return;

     qtyValue.textContent = quantity;

     if (!isWordPress) {
       updateStaticBag();
       return;
     }

     const formData = new FormData();

     formData.append('action', 'update_cart_quantity');
     formData.append('cart_key', cartItem.dataset.cartKey);
     formData.append('quantity', quantity);
     formData.append('nonce', window.cartData.nonce);

     fetch(window.cartData.ajax_url, {
         method: 'POST',
         body: formData
       })
       .then(response => response.json())
       .then(data => {
         if (!data.success) {
           qtyValue.textContent = current;
           return;
         }

         if (document.querySelector('.cart__container')) {
           window.location.reload();
           return;
         }

         return refreshCartFragments();
       })
       .catch(error => {
         qtyValue.textContent = current;
         console.error('Ошибка обновления количества:', error);
       });

   });

   if (!isWordPress) {
     updateStaticBag();
   }

   const burgerBtn = document.querySelector('.header__burger-btn');
   const menu = document.querySelector('.menu');

   if (burgerBtn && menu) {
     const setMenuOpen = (isOpen) => {
       menu.classList.toggle('is-open', isOpen);
       burgerBtn.setAttribute('aria-expanded', String(isOpen));
       document.body.classList.toggle('scroll-lock', isOpen);
     };

     burgerBtn.addEventListener('click', () => {
       setMenuOpen(!menu.classList.contains('is-open'));
     });

     menu.addEventListener('click', (event) => {

       if (menu.classList.contains('is-open')) {
         const rect = menu.getBoundingClientRect();
         const clickX = event.clientX - rect.left;
         const clickY = event.clientY - rect.top;

         const isClickOnCloseX = clickX > rect.width - 70 && clickX < rect.width - 10;
         const isClickOnCloseY = clickY > 20 && clickY < 80;

         if (isClickOnCloseX && isClickOnCloseY) {
           setMenuOpen(false);
         }
       }
     });

     window.addEventListener('keydown', (e) => {
       if (e.key === 'Escape' && menu.classList.contains('is-open')) {
         setMenuOpen(false);
       }
     });
   }
 });

 document.addEventListener('DOMContentLoaded', () => {
   const shopToggle = document.querySelector('.shop-toggle');
   const menuItem = shopToggle ? shopToggle.closest('.menu__item') : null;

   if (shopToggle && menuItem) {
     shopToggle.setAttribute('aria-expanded', 'false');

     shopToggle.addEventListener('click', (e) => {
       e.preventDefault();
       const isActive = menuItem.classList.toggle('is-active');
       shopToggle.setAttribute('aria-expanded', String(isActive));
     });

     document.addEventListener('click', (e) => {
       if (!menuItem.contains(e.target)) {
         menuItem.classList.remove('is-active');
         shopToggle.setAttribute('aria-expanded', 'false');
       }
     });

     window.addEventListener('keydown', (e) => {
       if (e.key === 'Escape') {
         menuItem.classList.remove('is-active');
         shopToggle.setAttribute('aria-expanded', 'false');
       }
     });
   }
 });

 function applyShopFilters() {

   const params = new URLSearchParams();

   const search = document.getElementById('shop-search')?.value;
   if (search) params.set('s_query', search);

   const category = document.getElementById('shop-category')?.value;
   if (category) params.set('category', category);

   const orderby = document.getElementById('shop-orderby')?.value;
   if (orderby) params.set('orderby', orderby);

   if (document.getElementById('sale-toggle')?.checked) params.set('on_sale', '1');
   if (document.getElementById('stock-toggle')?.checked) params.set('in_stock', '1');

   const range = document.getElementById('range-slider');
   if (range && range.noUiSlider) {
     const values = range.noUiSlider.get();

     params.set('min_price', Math.round(values[0]));
     params.set('max_price', Math.round(values[1]));
   }

   window.location.href = window.location.pathname + '?' + params.toString();
 }
 document.addEventListener('DOMContentLoaded', () => {
   if (!isWordPress) return;

   const category = document.getElementById('shop-category');
   const orderby = document.getElementById('shop-orderby');
   const searchBtn = document.getElementById('shop-search-btn');
   const searchInput = document.getElementById('shop-search');
   const saleToggle = document.getElementById('sale-toggle');
   const stockToggle = document.getElementById('stock-toggle');
   const priceBtn = document.getElementById('shop-price-btn');

   [priceBtn, searchBtn].forEach((btn) => {
     if (btn) {
       btn.addEventListener('click', applyShopFilters);
     }
   });

   [saleToggle, stockToggle, category, orderby].forEach((field) => {
     if (field) {
       field.addEventListener('change', applyShopFilters);
     }
   });

   if (searchInput) {
     searchInput.addEventListener('keydown', (e) => {
       if (e.key === 'Enter') {
         e.preventDefault();
         applyShopFilters();
       }
     });
   }
 });

 document.addEventListener('DOMContentLoaded', () => {

   const tabLinks = document.querySelectorAll('.product__tabs-link');
   const tabContents = document.querySelectorAll('.product__tabs-content');
   const thumbnails = document.querySelectorAll('.product__miniature-img');
   const mainPicture = document.querySelector('.product__main-images');
   const divider = document.querySelector('.product__main-divider');
   const counterBtns = document.querySelectorAll('.product__counter-btn');
   const counterValue = document.querySelector('.product__counter-value');
   const addToCartBtn = document.querySelector('.product__counter-add');
   const notification = document.querySelector('.notification__inner');

   const showNotification = () => {
     if (notification) {
       notification.classList.remove('notification--hidden');
     }
   };

   if (counterBtns.length && counterValue) {
     let count = 1;

     counterBtns.forEach((btn) => {
       btn.addEventListener('click', () => {
         if (btn.textContent.trim() === '+') {
           count++;
         }
         if (btn.textContent.trim() === '-' && count > 1) {
           count--;
         }
         counterValue.textContent = count;
       });
     });

     if (addToCartBtn) {
       addToCartBtn.addEventListener('click', (e) => {
         if (!isWordPress) {
           e.preventDefault();
           showNotification();
           return;
         }

         const productId = addToCartBtn.dataset.productId;
         const quantity = Number(counterValue.textContent);
         const formData = new FormData();

         formData.append('product_id', productId);
         formData.append('quantity', quantity);

         fetch(`${siteUrl}?wc-ajax=add_to_cart`, {
             method: 'POST',
             body: formData
           })
           .then(response => response.json())

           .then(data => {
             if (data.error) {
               console.error('Товар не добавлен в корзину:', data);
               return;
             }

             applyCartFragments(data);
             showNotification();
           })
           .catch(error => {
             console.error('Ошибка при добавлении в корзину:', error);
           });
       });
     }
   }

   thumbnails.forEach((thumbnail, index) => {
     thumbnail.addEventListener('click', () => {
       if (divider) {
         divider.className = 'product__main-divider';
         divider.classList.add(`position-${index + 1}`);
       }

       thumbnails.forEach(item => item.classList.toggle('is-active', item === thumbnail));

       const thumbImg = thumbnail.querySelector('img');
       const mainImg = mainPicture?.querySelector('img');

       if (!thumbImg || !mainImg) return;

       mainPicture.querySelectorAll('source').forEach((source) => {
         const thumbSource = thumbnail.querySelector(`source[type="${source.type}"]`);

         if (thumbSource) {
           source.srcset = thumbSource.srcset;
         }
       });
       mainImg.src = thumbImg.getAttribute('src');
       mainImg.srcset = thumbImg.getAttribute('srcset') || '';
       mainImg.alt = thumbImg.alt;
     });
   });

   document.querySelectorAll('.rewiews-form__rating-icon').forEach((group) => {
     const ratingLabels = group.querySelectorAll('label');

     ratingLabels.forEach((label, index) => {
       label.addEventListener('click', () => {

         ratingLabels.forEach((item, itemIndex) => {
           const use = item.querySelector('use');

           if (!use) return;

           const href = use.getAttribute('xlink:href');
           const spritePath = href.split('#')[0];

           use.setAttribute('xlink:href', spritePath + (itemIndex <= index ? '#star' : '#star-white'));
         });
       });
     });
   });

   tabLinks.forEach((link) => {
     link.addEventListener('click', (e) => {
       e.preventDefault();

       const targetId = link.getAttribute('href');
       const target = targetId && targetId.length > 1 ? document.querySelector(targetId) : null;

       if (!target) return;

       tabLinks.forEach((item) => {
         item.classList.remove('product__tabs-link--active');
       });

       tabContents.forEach((content) => {
         content.classList.remove('product__tabs-content--active');
       });

       link.classList.add('product__tabs-link--active');
       target.classList.add('product__tabs-content--active');
     });
   });
 });

 const accountTabs = document.querySelectorAll('.account__tab');

 accountTabs.forEach((tab) => {
   tab.addEventListener('click', () => {
     accountTabs.forEach((item) => {
       item.classList.toggle('account__tab--active', item === tab);
       item.setAttribute('aria-selected', String(item === tab));
     });

     document.querySelectorAll('.account-form').forEach((form) => {
       form.classList.toggle('account-form--active', form.id === `${tab.dataset.tab}-form`);
     });
   });
 });

 document.querySelectorAll('.cart__box-quantity').forEach((counter) => {
   const value = counter.querySelector('.cart__box-qty-value');

   counter.querySelectorAll('.cart__box-qty-btn').forEach((button) => {
     button.addEventListener('click', () => {
       const current = Number(value.textContent.trim());
       let quantity = current;

       if (button.dataset.action === 'increase') {
         quantity++;
       } else if (quantity > 1) {
         quantity--;
       }

       if (quantity === current) return;

       value.textContent = quantity;

       if (!isWordPress) return;

       const formData = new FormData();

       formData.append('action', 'update_cart_quantity');
       formData.append('cart_key', counter.dataset.cartKey);
       formData.append('quantity', quantity);
       formData.append('nonce', window.cartData.nonce);

       fetch(window.cartData.ajax_url, {
           method: 'POST',
           body: formData
         })

         .then(response => response.json())
         .then(data => {
           if (data.success) {
             window.location.reload();
           } else {
             value.textContent = current;
           }
         })
         .catch(() => {
           value.textContent = current;
         });
     });
   });
 });

 document.querySelectorAll('.cart__box-remove').forEach((button) => {

   button.addEventListener('click', () => {

     if (!isWordPress) {
       button.closest('.cart__box-item')?.remove();
       return;
     }

     const formData = new FormData();

     formData.append('action', 'remove_cart_item');
     formData.append('cart_key', button.dataset.cartKey);
     formData.append('nonce', window.cartData.nonce);

     fetch(window.cartData.ajax_url, {
         method: 'POST',
         body: formData,

       })

       .then((response) => response.json())
       .then((data) => {

         if (data.success) {
           window.location.reload();
         } else {
           console.error('Ошибка удаления товара:', data);

         }
       })
       .catch((error) => {
         console.error('Ошибка удаления товара:', error);
       });
   });

 });

 const couponButton = document.querySelector('.cart__coupon-btn');
 const couponInput = document.querySelector('#coupon_code');

 if (couponButton && couponInput && isWordPress) {
   couponButton.addEventListener('click', () => {
     const formData = new FormData();

     formData.append('action', 'apply_cart_coupon');
     formData.append('coupon_code', couponInput.value.trim());
     formData.append('nonce', window.cartData.coupon_nonce);

     fetch(window.cartData.ajax_url, {
         method: 'POST',
         body: formData
       })
       .then(response => response.json())
       .then(data => {
         if (data.success) {
           window.location.reload();
         } else {
           alert(data.data || 'Не удалось применить купон');
         }
       })
       .catch(() => {
         alert('Не удалось применить купон');
       });
   });
 }

 document.addEventListener("DOMContentLoaded", function () {

   const searchToggle = document.querySelector(".header__search-toggle");
   const searchForm = document.querySelector(".header__search-form");
   const searchInput = document.querySelector(".header__search-input");

   if (!searchToggle || !searchForm || !searchInput) return;
   searchToggle.addEventListener("click", function (event) {
     event.preventDefault();
     const isOpen = searchForm.classList.toggle("is-open");
     searchToggle.setAttribute("aria-expanded", String(isOpen));
     if (isOpen) {
       searchInput.focus();
     }
   });

   window.addEventListener('keydown', (e) => {
     if (e.key === 'Escape' && searchForm.classList.contains('is-open')) {
       searchForm.classList.remove('is-open');
       searchToggle.setAttribute('aria-expanded', 'false');
     }
   });
 });
