class Modal {
    constructor(template = 'MODAL TEXT') {
        this.modalOverlay = document.createElement('div');
        this.modal = document.createElement('div');

        this.modalOverlay.style.cssText = `
                position: fixed;
                width: 100vw;
                height: 100vh;
                background: #00000099;
                top: 0;
                left: 0;
                z-index: 10;
                display: flex;
                justify-content: center;
                align-items: center;
            `;

        this.modalOverlay.classList.add('modal__overlay');
        this.modal.classList.add('modal');

        this.modalOverlay.addEventListener('click', this.deleteModal);

        this.modal.innerHTML = template;

        document.body.append(this.modalOverlay);
        this.modalOverlay.append(this.modal);

        this.createCloseBtn();
    }

    deleteModal = (event) => {
        if (event.target == this.modalOverlay || event.target == this.closeBtn) {
            this.modalOverlay.remove();
        }
    }

    createCloseBtn = () => {
        this.closeBtn = document.createElement('button');
        this.closeBtn.innerHTML = 'X';
        this.closeBtn.style.cssText = `
            font-size: 30px;
            background: none;
            border: none;
            position: absolute;
            right: 10px;
            top: 0px;
            cursor: pointer;
        `;

        this.closeBtn.addEventListener('click', this.deleteModal);

        this.modal.append(this.closeBtn);
    }

    setTemplate = (template) => {
        this.modal.innerHTML = template;
        this.createCloseBtn();
    }
}
