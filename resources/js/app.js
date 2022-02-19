require('./bootstrap');


const likeButtons = document.querySelectorAll('.like_button')
likeButtons.forEach(function (btn){
    btn.onclick = async function (ev){
        const id = this.getAttribute('data-target');
        const response = await axios.post(`/api/posts/${id}/likes/increment`);
        if (response.status === 200){
            const paragraph = document.querySelector(`.likes_counter[data-target="${id}"]`);
            paragraph.innerHTML = response.data;
        }
    };
});

const viewedButtons = document.querySelectorAll('.viewed_button')
viewedButtons.forEach(function (btn){
    btn.onclick = async function (ev){
        const id = this.getAttribute('data-target');
        const response = await axios.post(`/api/posts/${id}/views/increment`);
        if (response.status === 200){
            const paragraph = document.querySelector(`.views_counter[data-target="${id}"]`);
            paragraph.innerHTML = response.data;
        }
    };
});
