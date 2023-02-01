(function(){
    const timeout = 2000,
          xhr = new XMLHttpRequest(),
          id = document.currentScript.getAttribute('data-id');

    xhr.open("GET", '/banners/data/' + id, true);
    xhr.onload = function (e) {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                responseText = JSON.parse(xhr.response)
                if( responseText.status == '0' ) return false;

                    //load external css
                        var head  = document.getElementsByTagName('head')[0];
                        var link  = document.createElement('link');
                        link.rel  = 'stylesheet';
                        link.type = 'text/css';
                        link.href = '/css/banner.css';
                        link.media = 'all';
                        head.appendChild(link);

                    const banner_template =
                        `<div class="banner is--hidden">` +
                        `<div class="banner__body">` +
                        `<div class="banner__content">${responseText.text}</div>` +
                        `<div class="banner__footer"><span class="banner__close-button">Close Popup</span>` +
                        `</div>` +
                        `</div>`;

                    document.body.insertAdjacentHTML('beforeend', banner_template );
                    const banner_el = document.querySelector('.banner'),
                          banner_close_button = banner_el.querySelector('.banner__close-button');

                    banner_close_button.addEventListener('click', () => {
                        banner_el.classList.add('is--hidden');
                        setTimeout( () => {
                            banner_el.remove()
                        }, 300)
                    })

                setTimeout(()=>{
                    banner_el.classList.remove('is--hidden');
                    updateViewsCount( id );
                }, timeout)
            }
            else {
                console.error(xhr.statusText);
                reject(xhr.statusText);
            }
        } else {
            reject(xhr.statusText);
        }
    };
    xhr.setRequestHeader("Content-type", "x-www-form-urlencoded");
    xhr.send();

    function updateViewsCount( id ){
        var xhr = new XMLHttpRequest();

        xhr.open("GET", '/banners/updateviews/' + id, true);
        xhr.onload = function (e) {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    responseText = JSON.parse(xhr.response)
                }
                else {
                    console.error(xhr.statusText);
                    reject(xhr.statusText);
                }
            } else {
                reject(xhr.statusText);
            }
        }
        xhr.setRequestHeader("Content-type", "x-www-form-urlencoded");
        xhr.send();
    }
})()