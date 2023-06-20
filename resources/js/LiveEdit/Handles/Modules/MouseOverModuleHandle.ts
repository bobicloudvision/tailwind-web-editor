import {
    getElementFriendlyName,
    allowedEditElementsList,
    elementHasParentsWithId,
    elementHasParentsWithAttribute
} from "../../helpers";

import {ElementHandle} from "./../ElementHandle";

export class MouseOverModuleHandle extends ElementHandle {

    public handleNameElement;
    public handleMainElement;

    constructor(public liveEdit) {

        super(liveEdit);

        this.createModuleHandle();
        this.addListener();

    }

    public createModuleHandle() {

        const createModuleHandle = this.iframeManager.document.createElement("div");
        createModuleHandle.id = 'js-live-edit-module-handle';
        createModuleHandle.innerHTML = '<div id="js-live-edit-module-handle-name">Loading module..</div>';

        this.iframeManager.body.appendChild(createModuleHandle);

        this.handleMainElement = this.iframeManager.document.getElementById('js-live-edit-module-handle');
        this.handleNameElement = this.iframeManager.document.getElementById('js-live-edit-module-handle-name');
    }

    public addListener()
    {
        const app = this;
        app.iframeManager.document.addEventListener('mouseover', e => {

            app.handleMainElement.style.display = 'none';

            let mouseOverModule = app.iframeManager.document.elementFromPoint(e.clientX, e.clientY);
            if (mouseOverModule) {

                this.liveEdit.mouseOverModule = mouseOverModule;
                if (mouseOverModule == this.liveEdit.clickedModule) {
                    return;
                }

                let getElementParentModuleElement = elementHasParentsWithAttribute(mouseOverModule, 'tailwind-x:module');
                if (!getElementParentModuleElement) {
                    return;
                }

                app.handleMainElement.style.width = (getElementParentModuleElement.clientWidth + 2.5) + 'px';
                app.handleMainElement.style.height = (getElementParentModuleElement.clientHeight + 2.5) + 'px';

                let mouseOverElementBounding = getElementParentModuleElement.getBoundingClientRect();
                app.handleMainElement.style.top = (mouseOverElementBounding.top + (app.iframeManager.window.scrollY - 2.5)) + 'px';
                app.handleMainElement.style.left = (mouseOverElementBounding.left + (app.iframeManager.window.scrollX - 2.5)) + 'px';
                app.handleMainElement.style.display = 'block';

                let moduleFriendlyName = getElementParentModuleElement.getAttribute('tailwind-x:module').toUpperCase();
                if (app.handleNameElement) {
                    app.handleNameElement.innerText = moduleFriendlyName;
                }

            }
        }, {passive: true});
    }

    public hide()
    {
        this.handleMainElement.style.display = 'none';
    }

}
