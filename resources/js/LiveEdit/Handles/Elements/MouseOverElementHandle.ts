import {getElementFriendlyName, elementHasParentsWithId, allowedEditElementsList} from "../../helpers";
import {ElementHandle} from "./../ElementHandle";

export class MouseOverElementHandle extends ElementHandle {

    public handleNameElement;
    public handleMainElement;

    constructor(public liveEdit) {

        super(liveEdit);

        this.createElementHandle();
        this.addListener();

    }

    public createElementHandle() {

        const createElementHandle = this.iframeManager.document.createElement("div");
        createElementHandle.id = 'js-live-edit-element-handle';
        createElementHandle.innerHTML = '<div id="js-live-edit-element-handle-name">Loading..</div>';

        this.iframeManager.body.appendChild(createElementHandle);

        this.handleMainElement = this.iframeManager.document.getElementById('js-live-edit-element-handle');
        this.handleNameElement = this.iframeManager.document.getElementById('js-live-edit-element-handle-name');
    }

    public addListener()
    {
        const app = this;
        app.iframeManager.document.addEventListener('mouseover', e => {

            app.handleMainElement.style.display = 'none';

            let mouseOverElement = app.iframeManager.document.elementFromPoint(e.clientX, e.clientY);
            if (mouseOverElement) {

                this.liveEdit.mouseOverElement = mouseOverElement;
                if (mouseOverElement == this.liveEdit.clickedElement) {
                    return;
                }

                if (!this.canIEditThisElement(mouseOverElement)) {
                    return;
                }

                mouseOverElement.classList.add('js-live-edit-element');

                app.handleMainElement.style.width = (mouseOverElement.offsetWidth + 10) + 'px';
                app.handleMainElement.style.height = (mouseOverElement.offsetHeight + 10) + 'px';

                let mouseOverElementBounding = mouseOverElement.getBoundingClientRect();
                app.handleMainElement.style.top = (mouseOverElementBounding.top + (app.iframeManager.window.scrollY - 5)) + 'px';
                app.handleMainElement.style.left = (mouseOverElementBounding.left + (app.iframeManager.window.scrollX - 5)) + 'px';

                if (app.handleNameElement) {
                    app.handleNameElement.innerText = getElementFriendlyName(mouseOverElement.tagName);
                }

                app.handleMainElement.style.display = 'block';

            }
        }, {passive: true});
    }

    public hide()
    {
        this.handleMainElement.style.display = 'none';
    }

}
