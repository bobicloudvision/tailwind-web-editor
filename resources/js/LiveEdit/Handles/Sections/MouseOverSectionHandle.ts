import {
    getElementFriendlyName,
    elementHasParentsWithId,
    allowedEditElementsList,
    elementHasParentsWithTagName,
    elementHasParentsWithAttribute,
} from "../../helpers";
import {ElementHandle} from "./../ElementHandle";

export class MouseOverSectionHandle extends ElementHandle {

    public handleActionAddElementTop;
    public handleActionAddElementBottom;
    public handleMainElement;

    constructor(public liveEdit) {

        super(liveEdit);

        this.createElementHandle();
        this.addListener();

    }

    public createElementHandle() {

        const createElementHandle = this.iframeManager.document.createElement("div");
        createElementHandle.id = 'js-live-edit-section-handle';
        createElementHandle.innerHTML = '' +
            '<button type="button" class="js-live-edit-section-handle-action-add" id="js-live-edit-section-handle-action-add-top">Add section</button>' +
            '<button type="button" id="js-live-edit-section-handle-action-add-block"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"/></svg> Add Block</button>' +
            '<button type="button" class="js-live-edit-section-handle-action-add" id="js-live-edit-section-handle-action-add-bottom">Add section</button>';

        this.iframeManager.body.appendChild(createElementHandle);

        this.handleMainElement = this.iframeManager.document.getElementById('js-live-edit-section-handle');
        this.handleActionAddElementTop = this.iframeManager.document.getElementById('js-live-edit-section-handle-action-add-top');
        this.handleActionAddElementBottom = this.iframeManager.document.getElementById('js-live-edit-section-handle-action-add-bottom');
    }

    public addListener()
    {
        const app = this;
        app.iframeManager.document.addEventListener('mouseover', e => {
            app.handleMainElement.style.display = 'none';
            let mouseOverElement = app.iframeManager.document.elementFromPoint(e.clientX, e.clientY);
            if (mouseOverElement) {

                let getElementParentSectionElement = elementHasParentsWithTagName(mouseOverElement, 'section');
                if (!getElementParentSectionElement) {
                    return;
                }

                app.handleMainElement.style.width = (getElementParentSectionElement.offsetWidth) + 'px';
                app.handleMainElement.style.height = (getElementParentSectionElement.offsetHeight) + 'px';

                let mouseOverElementBounding = getElementParentSectionElement.getBoundingClientRect();
                app.handleMainElement.style.top = (mouseOverElementBounding.top + (app.iframeManager.window.scrollY)) + 'px';
                app.handleMainElement.style.left = (mouseOverElementBounding.left + (app.iframeManager.window.scrollX)) + 'px';

                app.handleMainElement.style.display = 'block';


            }
        }, {passive: true});
    }

    public hide()
    {
        this.handleMainElement.style.display = 'none';
    }

}
