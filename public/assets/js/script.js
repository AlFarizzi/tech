let btn = document.getElementById('modalBtn');
let sBtn = document.getElementById('searchBtn');
if (btn !== null) {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        let modal = document.getElementById('modalForm');
        modal.style.display = 'flex';
        modal.style.justifyContent = 'center';
        modal.style.alignItems = 'center';
        let modalContent = document.getElementById('modalContent');
        modalContent.classList.add("showModal")
    })
}

if (sBtn !== null) {
    sBtn.addEventListener('click', (e) => {
        e.preventDefault();
        let modal = document.getElementById('modalSearch');
        modal.style.display = 'flex';
        modal.style.justifyContent = 'center';
        modal.style.alignItems = 'center';
        let modalContent = document.getElementById('modalContentForm');
        modalContent.classList.add("showModal")
    })
}


let modalForm = document.getElementById('modalForm');
if (modalForm !== null) {
    modalForm.addEventListener('click', (e) => {
        if (e.target === modalForm) {
            modalForm.style.display = 'none';
        }
    })
}

let modalSearch = document.getElementById('modalSearch');
if (modalSearch !== null) {
    modalSearch.addEventListener('click', (e) => {
        if (e.target === modalSearch) {
            modalSearch.style.display = 'none';
        }
    })
}
let show = document.getElementById('show-icon');
if (show !== null) {
    show.addEventListener('click', () => {
        let nav = document.getElementById('navigation')
        nav.style.transition = `1s ease all`;
        nav.style.transform = `translateX(0)`;
    })
}

let close = document.getElementById('close');
if (close !== null) {
    console.log(close);
    close.addEventListener('click', () => {
        let nav = document.getElementById('navigation')
        nav.style.transition = `1s ease all`;
        nav.style.transform = `translateX(-100%)`
        console.log(nav);
    })
}
