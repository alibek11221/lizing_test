const idHolder = document.querySelector('input.id_holder');
const id = idHolder.id;
setTimeout(async () => {
    const response = await axios.post(`/api/posts/${id}/views/increment`);
    if (response.status === 200) {
        const paragraph = document.querySelector(`.views_counter[data-target="${id}"]`);
        paragraph.innerHTML = response.data;
    }
}, 5000);
const sub = document.querySelector('#comment_sub_btn');
console.log(sub);
sub.onclick = async function (ev) {
    ev.preventDefault();
    const subject = document.querySelector('#subject').value;
    const body = document.querySelector('#body').value;
    this.setAttribute('disabled', true);
    this.innerHTML = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...'
    try {
        const response = await axios.post(`/api/posts/${id}/comments/post`, {subject, body});
        this.parent.innerHTML = '<p>Ваш комментарий успешно сохранен</p>'
        return true;
    } catch (e) {
        this.innerHTML = 'Отправить';
        this.removeAttribute('disabled');
        const {errors} = e.response.data;
        let message = '';
        if (errors.subject !== undefined){
            message += errors.subject.join('<br>') + '<br>';
        }
        if (errors.body){
            message += errors.body.join('<br>') + '<br>';
        }
        const errorMsg = document.querySelector('#error');
        errorMsg.innerHTML = message;
        setTimeout(() => {
            errorMsg.innerText = '';
        }, 5000)
        return true;
    }


};
