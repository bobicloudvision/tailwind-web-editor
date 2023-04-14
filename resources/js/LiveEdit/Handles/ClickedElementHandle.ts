import {allowedEditElementsList, getElementFriendlyName, elementHasParentsWithId} from "../helpers";
import {ElementHandle} from "./ElementHandle";

export class ClickedElementHandle extends ElementHandle {

    public name;
    public element;


    constructor(public liveEdit) {

        super(liveEdit);

        this.createElementHandle();
        this.addListener();
    }

    public createElementHandle() {

        const createElementHandle = this.iframeManager.document.createElement("div");
        createElementHandle.id = 'js-live-edit-element-handle-active';
        createElementHandle.innerHTML = '<div id="js-live-edit-element-handle-active-name">Image</div>' +
            '<div id="js-live-edit-element-handle-active-settings">' +
            '<button type="button">Settings</button>' +
            '<button type="button">View</button>' +
            '<button type="button">Skins</button>' +
            '</div>';

        this.iframeManager.body.appendChild(createElementHandle);

        this.element = this.iframeManager.document.getElementById('js-live-edit-element-handle-active');
        this.name = this.iframeManager.document.getElementById('js-live-edit-element-handle-active-name');

    }

    public addListener() {

        const app = this;
        app.iframeManager.document.addEventListener('click', e => {
            let editorElements = app.iframeManager.body.getElementsByTagName('*');
            for (var j = 0; j < editorElements.length; j++) {
                app.element.style.display = 'none';
            }
            let clickedElement = app.iframeManager.document.elementFromPoint(e.clientX, e.clientY);
            if (clickedElement) {

                if (!this.canIEditThisElement(clickedElement)) {
                    return;
                }

                this.liveEdit.clickedElement = clickedElement;
                this.liveEdit.handles.mouseOverElementHandle.hide();

                app.element.style.width = (clickedElement.clientWidth + 5) + 'px';
                app.element.style.height = (clickedElement.clientHeight + 5) + 'px';

                let mouseOverElementBounding = clickedElement.getBoundingClientRect();
                app.element.style.top = (mouseOverElementBounding.top + (app.iframeManager.window.scrollY - 2.5)) + 'px';
                app.element.style.left = (mouseOverElementBounding.left + (app.iframeManager.window.scrollX - 2.5)) + 'px';

                app.name.innerText = getElementFriendlyName(clickedElement.tagName);
                app.element.style.display = 'block';

            }
        }, {passive: true});
    }

}
