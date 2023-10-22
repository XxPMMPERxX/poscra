window.openModal = function(modalId, postId, postTitle = '') {
    let modal = document.getElementById(modalId);
    let postURL = "/post/" + postId;

    modal.showModal();
    history.pushState({}, postTitle, postURL);
    modal.onclose = function(){
        history.back();
    }
};